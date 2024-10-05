

// class tanpa constructor "class polos"
class Polos {
    String dataString;
    int dataInteger;
}

// class dengan constructor
class Mahasiswa {
    // atribut
    String nama;
    String NIM;
    String prodi;

    // constructor nama sama dengan nama class
    // constructor dipanggil saat objek pertama kali dibuat
    // constructor tidak mengembalikan nilai (tidak punya return)

    // constructor dengan parameter
    Mahasiswa(String InputNama, String InputNIM, String InputProdi) {
        nama = InputNama;
        NIM = InputNIM;
        prodi = InputProdi;

        // cetak
        System.out.println("Nama Mahasiswa : " + nama);
        System.out.println("NIM : " + NIM);
        System.out.println("Prodi : " + prodi);

    }

}

public class App {
    public static void main(String[] args) throws Exception {
        // // instansiasi objek class polos
        // Polos objekPolos = new Polos();

        // // pengisian data
        // objekPolos.dataString = "Polos";
        // objekPolos.dataInteger = 18;

        // // cetak
        // // System.out.println(objekPolos.dataString);
        // // System.out.println(objekPolos.dataInteger);

        // instansiasi objek class mahasiswa
        Mahasiswa mhs_1 = new Mahasiswa("Ucup", "54321", "PTI");

        Mahasiswa mhs_2 = new Mahasiswa("Boby", "98760", "PTI");

    }
}