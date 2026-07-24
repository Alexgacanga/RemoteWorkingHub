<x-main-layout>
<div class="px-4 md:px-8 my-6">
   <div class="max-w-7xl mx-auto border border-slate-200 rounded-md overflow-x-auto">
      <table class="w-full">
         <thead
            class="text-slate-900 text-left text-sm font-semibold border-b border-slate-300 whitespace-nowrap">
            <tr class="bg-slate-50">
               <th scope="col" class="px-4 py-3.5">Name</th>
               <th scope="col" class="px-4 py-3.5">Email</th>
               <th scope="col" class="px-4 py-3.5">Title</th>
               <th scope="col" class="px-4 py-3.5">Role</th>
               <th scope="col" class="px-4 py-3.5">Actions</th>
            </tr>
         </thead>

         <tbody class="text-sm divide-y divide-slate-200">
            <tr class="hover:bg-slate-50">
               <td class="px-4 py-4 font-medium text-slate-900 whitespace-nowrap">
                  John Doe
               </td>
               <td class="px-4 py-4 text-slate-500">
                  john@readymadeui.com
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Product Designer
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Admin
               </td>
               <td class="px-4 py-4 flex gap-3">
                  <button type="button"
                     class="text-sm text-blue-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
                     aria-label="Edit John Doe">
                     Edit
                  </button>
                  <button type="button"
                     class="text-sm text-red-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 rounded"
                     aria-label="Delete John Doe">
                     Delete
                  </button>
               </td>
            </tr>

            <tr class="hover:bg-slate-50">
               <td class="px-4 py-4 font-medium text-slate-900 whitespace-nowrap">
                  Jane Smith
               </td>
               <td class="px-4 py-4 text-slate-500">
                  jane@readymadeui.com
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Frontend Engineer
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Member
               </td>
               <td class="px-4 py-4 flex gap-3">
                  <button aria-label="Edit Jane Smith"
                     class="text-sm text-blue-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Edit</button>
                  <button aria-label="Delete Jane Smith"
                     class="text-sm text-red-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 rounded">Delete</button>
               </td>
            </tr>

            <tr class="hover:bg-slate-50">
               <td class="px-4 py-4 font-medium text-slate-900 whitespace-nowrap">
                  Alex Brown
               </td>
               <td class="px-4 py-4 text-slate-500">
                  alex@readymadeui.com
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Backend Engineer
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Member
               </td>
               <td class="px-4 py-4 flex gap-3">
                  <button aria-label="Edit Alex Brown"
                     class="text-sm text-blue-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Edit</button>
                  <button aria-label="Delete Alex Brown"
                     class="text-sm text-red-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 rounded">Delete</button>
               </td>
            </tr>

            <tr class="hover:bg-slate-50">
               <td class="px-4 py-4 font-medium text-slate-900 whitespace-nowrap">
                  Priya Patel
               </td>
               <td class="px-4 py-4 text-slate-500">
                  priya@readymadeui.com
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Marketing Lead
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Manager
               </td>
               <td class="px-4 py-4 flex gap-3">
                  <button aria-label="Edit Priya Patel"
                     class="text-sm text-blue-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Edit</button>
                  <button aria-label="Delete Priya Patel"
                     class="text-sm text-red-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 rounded">Delete</button>
               </td>
            </tr>

            <tr class="hover:bg-slate-50">
               <td class="px-4 py-4 font-medium text-slate-900 whitespace-nowrap">
                  Michael Lee
               </td>
               <td class="px-4 py-4 text-slate-500">
                  michael@readymadeui.com
               </td>
               <td class="px-4 py-4 text-slate-500">
                  QA Engineer
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Member
               </td>
               <td class="px-4 py-4 flex gap-3">
                  <button aria-label="Edit Michael Lee"
                     class="text-sm text-blue-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Edit</button>
                  <button aria-label="Delete Michael Lee"
                     class="text-sm text-red-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 rounded">Delete</button>
               </td>
            </tr>

            <tr class="hover:bg-slate-50">
               <td class="px-4 py-4 font-medium text-slate-900 whitespace-nowrap">
                  Sara Khan
               </td>
               <td class="px-4 py-4 text-slate-500">
                  sara@readymadeui.com
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Content Writer
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Member
               </td>
               <td class="px-4 py-4 flex gap-3">
                  <button aria-label="Edit Sara Khan"
                     class="text-sm text-blue-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Edit</button>
                  <button aria-label="Delete Sara Khan"
                     class="text-sm text-red-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 rounded">Delete</button>
               </td>
            </tr>

            <tr class="hover:bg-slate-50">
               <td class="px-4 py-4 font-medium text-slate-900 whitespace-nowrap">
                  Daniel Wong
               </td>
               <td class="px-4 py-4 text-slate-500">
                  daniel@readymadeui.com
               </td>
               <td class="px-4 py-4 text-slate-500">
                  DevOps Engineer
               </td>
               <td class="px-4 py-4 text-slate-500">
                  Admin
               </td>
               <td class="px-4 py-4 flex gap-3">
                  <button aria-label="Edit Daniel Wong"
                     class="text-sm text-blue-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Edit</button>
                  <button aria-label="Delete Daniel Wong"
                     class="text-sm text-red-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 rounded">Delete</button>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
</x-main-layout>
