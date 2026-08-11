<x-main-layout>
<div class="px-4 md:px-8 my-6">
   <div class="max-w-7xl mx-auto border border-slate-200 rounded-md overflow-x-auto">
      <table class="w-full">
         <thead
            class="text-slate-900 text-left text-sm font-semibold border-b border-slate-300 whitespace-nowrap">
            <tr class="bg-slate-50">
               <th scope="col" class="px-4 py-3.5">First Name</th>
               <th scope="col" class="px-4 py-3.5">Last Name</th>
               <th scope="col" class="px-4 py-3.5">Email</th>
               <th scope="col" class="px-4 py-3.5">Phone</th>
               <th scope="col" class="px-4 py-3.5">ID Number</th>
            </tr>
         </thead>

         <tbody class="text-sm divide-y divide-slate-200">
            @foreach ($customer as $customer)
            <tr class="hover:bg-slate-50">
               <td class="px-4 py-4 font-medium text-slate-900 whitespace-nowrap">
                 {{ $customer->fname }}
               </td>
               <td class="px-4 py-4 text-slate-500">
                  {{ $customer->lname }}
               </td>
               <td class="px-4 py-4 text-slate-500">
                  {{ $customer->email }}
               </td>
               <td class="px-4 py-4 text-slate-500">
                  {{ $customer->phone_no }}
               </td>
               <td class="px-4 py-4 text-slate-500">
                  {{ $customer->id_no }}
               </td>
               <td class="px-4 py-4 flex gap-3">
                  <button aria-label="Edit Sara Khan"
                     class="text-sm text-blue-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Edit</button>
                  <button aria-label="Delete Sara Khan"
                     class="text-sm text-red-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 rounded">Delete</button>
               </td>
            </tr>
                @endforeach

         </tbody>
      </table>
   </div>
</div>
</x-main-layout>
