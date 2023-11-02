function HeroAbout() {
  return (
    <>
      <div class="container mt-20 pt-10 items-center justify-center justify-items-center justify-self-center">
        <h1 class="mb-4 text-4xl text-center font-extrabold tracking-tight leading-none text-backgroundAbout md:text-5xl lg:text-6xl">Welcome to Lab Informatika UMM</h1>
        <p class="mb-8 text-lg text-center font-normal text-backgroundAbout lg:text-xl">
          Laboratorium Teknik Informatika berfungsi sebagai pusat pembelajaran praktis dan eksperimental yang dipergunakan oleh mahasiswa dan pelayanan untuk riset dan konsultasi keteknikan mencakup desain sofware untuk animasi,
          administrasi, grafis dll.
        </p>

        <img src="/images/logo_lab_it_baru.png" className="container max-w-screen-2xl bg-no-repeat rounded-2xl p-20 my-10 bg-backgroundAbout" alt="" />

        <div className="text-backgroundAbout text-xl">
          <p className="mt-4">a. Laboratorium Rekayasa Perangkat Lunak</p>
          <p>Melakukan analisa kelayakan pembuatan, penerapan proyek perangkat lunak, analisa kebutuhan, perancangan, pembuatan dan penjaminan kualitas perangkat lunak serta melakukan rekayasa ulang perangkat lunak.</p>

          <p className="mt-4">b. Laboratorium Sistem dan Keamanan Jaringan</p>
          <p>Menganalisis permasalahan, memberikan solusi berupa perekayasaan, pembuatan dan pengelolaan, serta melakukan evaluasi pada sistem jaringan.</p>

          <p className="mt-4">c. Laboratorium Game Cerdas</p>
          <p>
            Bekerja dengan tim mengembangkan dan merancang video game. Mengkoordinasikan tugas kompleks menciptakan video game baru yang memiliki tugas seperti merancang karakter, level, teka-teki, art dan animasi. Software Engineer,
            Programmer, atau Computer Scientist yang terutama mengembangkan basis kode untuk video game atau perangkat lunak terkait, seperti alat-alat pengembangan game.
          </p>

          <p className="mt-4">d. Laboratorium Sains Data</p>
          <p>Menganalisis dan mengolah data menjadi suatu informasi dan pengetahuan.</p>
        </div>
      </div>
    </>
  );
}

export default HeroAbout;
