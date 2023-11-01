function LoginPage() {
  return (
    <>
      <div className="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="container py-8 px-4 mx-auto max-w-screen lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
          <div class="flex flex-col justify-center">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl">Welcome back!</h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl">Let us sign you in</p>
            <a href="/" class="text-gray-800 hover:underline font-medium text-lg inline-flex items-center">
              Back to Home
              <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
            </a>
          </div>
          <div>
            <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl">
              <h2 class="text-2xl font-bold text-gray-900">Sign In to iLab</h2>
              <form class="mt-8 space-y-6" action="#">
                <div>
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                    Your email
                  </label>
                  <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@gmail.com" required />
                </div>
                <div>
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                    Your password
                  </label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required
                  />
                </div>

                <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-backgroundAbout rounded-lg hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 sm:w-auto">
                  Log In your account
                </button>
                <div class="text-sm font-medium text-gray-900">
                  Don't have an account?{" "}
                  <a class="text-blue-600 hover:underline" href="/sign_up">
                    Register your account
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default LoginPage;
