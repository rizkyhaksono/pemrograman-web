import NavbarComponent from "../components/navbar";
import FooterComponent from "../components/footer";

import { Link } from "react-router-dom";

export default function HomePage() {
  return (
    <>
      <NavbarComponent />
      <nav>
        <ul>
          <li style={{ marginBottom: 5 }}>
            <button>
              <Link to="/">Home</Link>
            </button>
          </li>
          <li style={{ marginBottom: 5 }}>
            <button>
              <Link to="/about">About Us</Link>
            </button>
          </li>
          <li>
            <button>
              <Link to="/contact">Contact Us</Link>
            </button>
          </li>
        </ul>
      </nav>
      <p>Halaman Home</p>
      <FooterComponent />
    </>
  );
}
