function HeroContact() {
  return (
    <>
      <form className="container mt-10 pt-20">
        <p className="text-4xl font-bold mb-6 text-center text-gray-900">Contact Us</p>
        <div class="mb-6">
          <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
            Username
          </label>
          <input type="text" id="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5" placeholder="rizkyhaksono" required />
        </div>
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
            Email
          </label>
          <input type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="name@gmail.com" required />
        </div>
        <div class="mb-6">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900">
            Your message
          </label>
          <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Leave a comment..."></textarea>
        </div>
        <div class="flex items-start mb-6">
          <div class="flex items-center h-5">
            <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3" required />
          </div>
          <label for="terms" class="ml-2 text-sm font-medium text-gray-900 ">
            I agree with the{" "}
            <a href="/" class="text-login hover:underline">
              terms and conditions
            </a>
          </label>
        </div>
        <button type="submit" class="text-white bg-login hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
          Send Message
        </button>
      </form>
    </>
  );
}

export default HeroContact;
