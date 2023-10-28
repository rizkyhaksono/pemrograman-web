function Hero() {
  return (
    <div className="relative">
      <img src="/images/hero.jpg" alt="Hero iLab" />
      <p className="absolute text-5xl font-bold  text-white bottom-1/2 left-1/4 -translate-x-1/2 -translate-y-1/2">Selamat Datang</p>
      <p className="absolute text-xl font-normal  text-white top-1/2 left-1/4 -translate-x-1/2 -translate-y-1/2">di Website Praktikum Pemrograman Website</p>
    </div>
  );
}

export default Hero();
