<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      
       @if($data['period'] = 1)
            Good day  {{ Auth::user()->name }}
       @else
            Good Evening  {{ Auth::user()->name }}
       @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <p> Hi, {{ Auth::user()->name }} here is the details of your weather at your location </p>
                    <table>
                        <tr><td><b>Country: </b></td><td>{{$data['country'] }} </td></tr>
                        <tr><td><b>City: </b></td><td>{{$data['city'] }} </td></tr>
                        <tr><td><b>Local Time: </b></td><td>{{$data['localTime'] }} </td></tr>
                        <tr><td><b>Time Zone: </b></td><td>{{$data['timeZone'] }} </td></tr>
                        <tr><td><b>Temperature: </b></td><td>{{$data['temp'] }} <sup>0</sup>c </td></tr>
                        <tr><td><b>Description: </b></td><td>{{$data['text'] }}  </td> <td><img src="{{ $data['icon'] }}" /></td></tr>
                    </table>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
