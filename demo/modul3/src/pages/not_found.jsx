function NotFoundPage() {
  return (
    <>
      <div className="h-screen flex flex-col items-center justify-center">
        <h1 className="text-6xl font-bold text-red-500">404 - Not Found</h1>
        <p className="text-xl mt-2 text-gray-600">The page you are looking for does not exist.</p>
        <img src="/images/hero.jpg" alt="Error" className="mt-4 max-w-xs rounded-lg" />
        <a href="/" className="mt-3">
          <button
            type="button"
            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 shadow-red-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
          >
            Go Back to Home
          </button>
        </a>
      </div>
    </>
  );
}

export default NotFoundPage;
