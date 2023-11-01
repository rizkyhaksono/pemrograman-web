import "./App.css";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import HomePage from "./pages/home";
import AboutPage from "./pages/about";
import ContactPage from "./pages/contact";
import NotFoundPage from "./pages/not_found";
import SignUpPage from "./pages/sign_up";
import LoginPage from "./pages/sign_in";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<HomePage />} />
        <Route path="/home" element={<HomePage />} />
        <Route path="/about" element={<AboutPage />} />
        <Route path="/contact" element={<ContactPage />} />
        <Route path="/sign_up" element={<SignUpPage />} />
        <Route path="/login" element={<LoginPage />} />

        <Route path="*" element={<NotFoundPage />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
