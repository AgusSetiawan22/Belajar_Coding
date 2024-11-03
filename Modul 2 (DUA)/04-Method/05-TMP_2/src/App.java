class PersegiPanjang {
    // data member atau atribut
    String nama;
    double panjang;
    double lebar;
    double luas;
    double keliling;

    PersegiPanjang(String nama, double panjang, double lebar) {
        this.nama = nama;
        this.panjang = panjang;
        this.lebar = lebar;
        hitungLuas();
        hitungKeliling();
    }

    // Method 1: tanpa parameter dan return
    void cetak() {
        System.out.println("Nama : " + this.nama);
        System.out.println("Panjang : " + this.panjang);
        System.out.println("Lebar : " + this.lebar);
        System.out.println("Luas : " + this.luas);
        System.out.println("Keliling : " + this.keliling);
    }

    // Method 2: tanpa return dengan parameter
    void setNama(String nama) {
        this.nama = nama;
    }

    // Method 3: dengan return tanpa parameter
    String getNama() {
        return this.nama;
    }

    // Method 4: dengan return tanpa parameter
    double getLuas() {
        return this.luas;
    }

    // Method 5: dengan parameter dan return
    String deskripsi(String prefix) {
        return prefix + " Persegi Panjang " + this.nama;
    }

    // Method 6: tanpa parameter dan return
    void hitungLuas() {
        this.luas = this.panjang * this.lebar;
    }

    // Method tambahan: tanpa parameter dan return
    void hitungKeliling() {
        this.keliling = 2 * (this.panjang + this.lebar);
    }
}

public class App {
    public static void main(String[] args) throws Exception {
        // instansi atau menciptakan objek
        PersegiPanjang pp1 = new PersegiPanjang("PP1", 5, 3);

        // memanggil method cetak()
        System.out.println("Data awal:");
        pp1.cetak();

        // memanggil method setNama()
        pp1.setNama("Persegi Panjang A");

        System.out.println("\nData setelah nama diubah:");
        pp1.cetak();

        // memanggil method getNama dan getLuas
        String nama_pp = pp1.getNama();
        double luas_pp = pp1.getLuas();
        System.out.println("\nMengambil data dengan getter:");
        System.out.println("Nama : " + nama_pp);
        System.out.println("Luas : " + luas_pp);

        // memanggil method deskripsi()
        String deskripsi = pp1.deskripsi("Ini adalah");
        System.out.println("\n" + deskripsi);
    }
}