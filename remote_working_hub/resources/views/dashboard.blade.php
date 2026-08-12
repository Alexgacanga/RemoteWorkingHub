<x-main-layout>
<main class="flex-1 overflow-y-auto bg-gray-100 p-4 md:p-8">
                <div class="mx-auto max-w-7xl">
                    <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm">
                        <div class="relative isolate overflow-hidden bg-white">
                            <div
                                class="absolute inset-y-0 right-0 hidden w-1/3 bg-gradient-to-l from-[#4FC1FF]/10 to-transparent lg:block">
                            </div>
                            <div
                                class="relative grid gap-8 px-6 py-8 md:px-8 lg:grid-cols-[1.3fr_0.7fr] lg:items-center lg:px-10 lg:py-12">
                                <div>
                                    <h1 class="text-3xl font-extrabold tracking-tight text-black sm:text-4xl">Welcome
                                        back, Admin!</h1>
                                    <p class="mt-4 max-w-xl text-base leading-7 text-gray-600">
                                        Here is what is happening at the Remote Working Hub today. Track payments,
                                        monitor customers, and keep your operations moving with clarity.
                                    </p>
                                    <div class="mt-6 flex flex-wrap items-center gap-3">
                                        <a href="{{ route('payments.index') }}">
                                            <button type="button"
                                                class="inline-flex items-center rounded-xl bg-[#FF6245] px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#e9583d] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FF6245] focus-visible:ring-offset-2">
                                                View Payments
                                            </button>
                                        </a>
                                        <a href="{{ route('customers.index') }}">
                                            <button type="button"
                                                class="inline-flex items-center rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-black transition duration-200 hover:border-[#4FC1FF] hover:bg-[#4FC1FF]/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#4FC1FF] focus-visible:ring-offset-2">
                                                View Customers
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
</x-main-layout>
