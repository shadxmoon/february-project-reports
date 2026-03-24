<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center  px-3 py-1.5 bg-accent border border-transparent rounded-lg text-md text-white hover:bg-gray-700 hover:text-black focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
