class Mahasiswa {
    // Deklarasi variabel
    String nama;
    String nim;

    // Konstruktor
    Mahasiswa(String nama, String nim) {
        this.nama = nama;
        this.nim = nim;
    }

    // Method tanpa parameter dan return
    void cetak() {
        // Mencetak nama dan nim
        System.out.println("Nama: " + nama);
        System.out.println("NIM: " + nim);
    } 
}


public class App {
    public static void main(String[] args) {
        Mahasiswa mhs = new Mahasiswa("Budi", "123456");
        // memangil method cetak ()
        mhs.cetak(); 
    }
}









