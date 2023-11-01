function FooterComponent() {
  const customStyle2 = {
    height: "30px",
    width: "15px",
    marginRight: "5px",
  };

  const customStyle = {
    height: "20px",
    width: "20px",
    marginRight: "5px",
  };

  return (
    <footer className="text-center text-lg-start bg-light text-muted my-5 bg-white">
      <section className="container text-center text-md-start">
        <div className="row">
          <div className="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <img src="/images/logo-ilab.png" alt="Logo iLab" width="200" />

            <div className="py-5">
              © 2023 Copyright{" "}
              <a className="text-reset fw-bold" href="https://github.com/rizkyhaksono">
                Rizky Haksono
              </a>
            </div>
          </div>

          <div className="col-md-2 col-lg-3 col-xl-2 mx-auto mb-4">
            <h6 className="text-uppercase fw-bold mb-4">Services</h6>
            <p className="mb-2">
              <a href="https://github.com/rizkyhaksono" className="text-reset text-decoration-none">
                Email Marketing
              </a>
            </p>
            <p className="mb-2">
              <a href="https://github.com/rizkyhaksono" className="text-reset text-decoration-none">
                Campaigns
              </a>
            </p>
            <p className="mb-2">
              <a href="/" className="text-reset text-decoration-none">
                Branding
              </a>
            </p>
            <p>
              <a href="/" className="text-reset text-decoration-none">
                Offline
              </a>
            </p>
          </div>

          <div className="col-md-3 col-lg-3 col-xl-2 mb-4">
            <h6 className="text-uppercase fw-bold mb-4">About</h6>
            <p className="mb-2">
              <a href="/" className="text-reset text-decoration-none">
                Our Story
              </a>
            </p>
            <p className="mb-2">
              <a href="/" className="text-reset text-decoration-none">
                Benefits
              </a>
            </p>
            <p className="mb-2">
              <a href="/" className="text-reset text-decoration-none">
                Team
              </a>
            </p>
            <p>
              <a href="/" className="text-reset text-decoration-none">
                Careers
              </a>
            </p>
          </div>

          <div className="col-md-3 col-lg-3 col-xl-2 mb-4">
            <h6 className="text-uppercase fw-bold mb-4">Follow Us</h6>
            <p className="flex mb-3 row">
              <a href="https://www.facebook.com/profile.php?id=100009770654611" className="flex justify-start text-reset text-decoration-none">
                <img src="/images/logo-facebook.png" style={customStyle2} alt="Facebook" /> Facebook
              </a>
            </p>
            <p className="mb-3">
              <a href="https://twitter.com/rizkyhaksono" className="flex justify-start text-reset text-decoration-none">
                <img src="/images/logo-twitter.png" style={customStyle} alt="Twitter" /> Twitter
              </a>
            </p>
            <p>
              <a href="https://instagram.com/rizkyhaksonoo" className="flex justify-start text-reset text-decoration-none">
                <img src="/images/logo-instagram.png" style={customStyle} alt="Instagram" /> Facebook
              </a>
            </p>
          </div>
        </div>
      </section>
    </footer>
  );
}

export default FooterComponent;
