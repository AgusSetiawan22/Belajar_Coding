class BangunDatar {
    // Atribut
    double panjang;
    double lebar;
    double luas;
    double keliling;

    BangunDatar(double panjang, double lebar) {
        this.panjang = panjang;
        this.lebar = lebar;
    }

    void menghitungLuas() {
        luas = panjang * lebar;
        System.out.println("Luas : " + this.luas);
    }

    void menghitungKeliling() {
        keliling = 2 * (panjang + lebar);
        System.out.println("Keliling : " + this.keliling);
    }

    void setPanjang(double panjang) {
        this.panjang = panjang;
    }

    void setLebar(double lebar) {
        this.lebar = lebar;
    }

    double getLuas() {
        return this.luas;
    }

    double getKeliling() {
        return this.keliling;
    }

    String tampilkanInfo(String namaBangun) {
        return "Bangun Datar: " + namaBangun + " | Panjang: " + panjang + " | Lebar: " + lebar;
    }
}

public class App {
    public static void main(String[] args) {
        // Instansi 
        BangunDatar bdr_1 = new BangunDatar(5, 3);

        bdr_1.menghitungLuas();
        bdr_1.menghitungKeliling();

        // Mengubah lebar dan menghitung ulang
        bdr_1.setLebar(7);
        bdr_1.menghitungLuas();
        bdr_1.menghitungKeliling();

        // Mengubah lebar dan menghitung ulang lagi
        bdr_1.setLebar(4);
        bdr_1.menghitungLuas();
        bdr_1.menghitungKeliling();

        double luasPersegiPanjang = bdr_1.getLuas();
        double kelilingPersegiPanjang = bdr_1.getKeliling();
        System.out.println("Luas : " + luasPersegiPanjang);
        System.out.println("Keliling : " + kelilingPersegiPanjang);

        String infoBangun = bdr_1.tampilkanInfo("Persegi Panjang");
        System.out.println(infoBangun);
    }
}