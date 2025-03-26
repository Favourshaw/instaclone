<button {{ $attributes->merge(['type' => 'submit', 'class' => ' items-center px-5 py-2  my-4 bg-blue-600
hover:bg-blue-800 tracking-tight text-white rounded flex
        justify-center
        align-middle
border border-transparent rounded-md font-semibold text-xs text-white
focus:bg-blue-500  active:bg-blue-900  focus:outline-none focus:ring-2
focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ']) }}>
    {{ $slot }}
</button>
