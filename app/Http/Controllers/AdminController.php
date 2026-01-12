<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;  
use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;

class AdminController extends Controller
{
    // ================= DASHBOARD =================
    public function index()
    {
        return view('admin.Admin');
    }

    // ================= SIMPAN PRODUK =================
    public function storeProduk(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|unique:produk,kode_produk',
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'jumlah'      => 'required|integer|min:0',
            'harga'       => 'required|numeric|min:0',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = Str::slug($request->nama) . '_' . time() . '.' . $file->getClientOriginalExtension();

            // ✅ Simpan ke storage/app/public/produk
            $path = $file->storeAs('produk', $filename, 'public');

            // ✅ Path untuk database
            $gambarPath = 'storage/produk/' . $filename;
        }

        // Simpan data produk
        Produk::create([
            'kode_produk' => $request->kode_produk,
            'nama'        => $request->nama,
            'deskripsi'   => $request->deskripsi,
            'jumlah'      => $request->jumlah,
            'harga'       => $request->harga,
            'gambar'      => $gambarPath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil ditambahkan!');
    }
    
    // ================= DATA PRODUK =================
    public function getProduk()
    {
        $produk = Produk::all();
        return response()->json($produk);
    }

    public function deleteProduk($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus file gambar jika ada
        if ($produk->gambar) {
            // Hapus dari storage
            $filename = basename($produk->gambar);
            Storage::disk('public')->delete('produk/' . $filename);
        }

        $produk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus'
        ]);
    }

    // ================= EDIT PRODUK (untuk AJAX modal) =================
    public function editProduk($id)
    {
        $produk = Produk::findOrFail($id);
        return response()->json($produk);
    }


// ================= UPDATE PRODUK (untuk AJAX modal) =================
public function updateProdukAjax(Request $request, $id)
{
    try {
        // Debug: lihat data yang diterima
        \Log::info('Update Produk AJAX Request:', $request->all());
        
        $request->validate([
            'kode_produk' => 'required|unique:produk,kode_produk,' . $id,
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'jumlah'      => 'required|integer|min:0',
            'harga'       => 'required|numeric|min:0',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produk = Produk::findOrFail($id);
        $gambarPath = $produk->gambar;
        
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar) {
                $oldImagePath = str_replace('storage/', 'public/', $produk->gambar);
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }
            
            // Simpan gambar baru
            $file = $request->file('gambar');
            $filename = Str::slug($request->nama) . '_' . time() . '.' . $file->getClientOriginalExtension();
            
            if (!Storage::exists('public/produk')) {
                Storage::makeDirectory('public/produk');
            }
            
            $file->storeAs('public/produk', $filename);
            $gambarPath = 'storage/produk/' . $filename;
        }

        // Update data produk
        $produk->update([
            'kode_produk' => $request->kode_produk,
            'nama'        => $request->nama,
            'deskripsi'   => $request->deskripsi,
            'jumlah'      => $request->jumlah,
            'harga'       => $request->harga,
            'gambar'      => $gambarPath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui!'
        ]);

    } catch (\Exception $e) {
        \Log::error('Error updating product: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            'errors'  => $e->errors() ?? []
        ], 500);
    }
}

    // ================= HALAMAN EDIT PRODUK (halaman terpisah) =================
    public function editProdukPage($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.EditProduk', compact('produk'));
    }

    // ================= DATA USER =================
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    // ================= DATA TRANSAKSI =================
    public function getTransaksi()
    {
        $transaksi = Transaksi::with('user', 'produk')->get();
        return response()->json($transaksi);
    }

    // ================= TAMPILKAN FORM TAMBAH PRODUK =================
    public function showForm()
    {
        return view('admin.TambahProduk'); // Ganti dengan nama view form Anda
    }
}