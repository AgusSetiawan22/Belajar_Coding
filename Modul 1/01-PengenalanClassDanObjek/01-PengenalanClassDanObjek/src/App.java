// Mahasiswa class sebagai
class Mahasiswa {
    // Ciri-ciri atau atribut objek
    String Nama;
    String NIM;
    String Jurusan;
    String IPK;
    String Umur;
}

public class App {
    public static void main(String[] args) throws Exception {
        // instalasi objek
        Mahasiswa mhs_ = new Mahasiswa();
        mhs_.Nama = "agus";
        mhs_.NIM = "23241016"; 
        mhs_.Jurusan = "PTI";
        mhs_.IPK = "3.57";
        mhs_.Umur = "20";

        // cetak objek
        System.out.println("Nama Mahasiswa : " + mhs_.Nama);
        System.out.println("NIM : " + mhs_.NIM);
        System.out.println("Jurusan : " + mhs_.Jurusan);
        System.out.println("IPK : " + mhs_.IPK);
        System.out.println("Umur : " + mhs_.Umur);
    }
}