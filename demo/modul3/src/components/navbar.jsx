function Navbar() {
  return (
    <nav className="bg-white fixed w-full z-20 top-0 left-0 border-b border-gray-200">
      <div className="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" className="flex items-center">
          <img src="/images/logo-ilab.png" className="h-8 mr-3" alt="iLab Logo" />
        </a>
        <div className="flex md:order-2 gap-1">
          <button type="button" className="text-black bg-white hover:bg-gray-200 border font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">
            Sign Up
          </button>
          <button type="button" className="text-white bg-login hover:bg-blue-600 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">
            Log In
          </button>
          <button
            data-collapse-toggle="navbar-sticky"
            type="button"
            className="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100"
            aria-controls="navbar-sticky"
            aria-expanded="false"
          >
            <span className="sr-only">Open main menu</span>
            <svg className="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
        </div>
        <div className="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
          <ul className="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
            <li>
              <a href="/" className="block py-2 pl-3 pr-4 text-black hover:text-blue-500 rounded md:p-0" aria-current="page">
                Home
              </a>
            </li>
            <li>
              <a href="/about" className="block py-2 pl-3 pr-4 text-black hover:text-blue-500 rounded md:p-0">
                About Us
              </a>
            </li>
            <li>
              <a href="/contact" className="block py-2 pl-3 pr-4 text-black hover:text-blue-500 rounded md:p-0">
                Contact
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  );
}

export default Navbar;
