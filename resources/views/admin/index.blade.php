<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>ENG</title>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <style>
    body {
      font-family: 'Lato', sans-serif;
    }
  </style>
  <!-- Scripts -->
  <!-- Include Tippy.js CSS -->
<link rel="stylesheet" href="https://unpkg.com/@popperjs/core@2.9.3/dist/umd/popper.css" />

<!-- Include Tippy.js JavaScript -->
<script src="https://unpkg.com/@popperjs/core@2.9.3/dist/umd/popper.js"></script>

  @vite( 'resources/js/app.js')
</head>

<body class="">
  <div id="app">


    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg w-screen h-26">
      <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
        <div>
          <a href="/admin" class="flex items-center gap-2 ">
            <img src="{{ asset('images/logo.jpg') }}" alt="#" class="h-10 w-10 rounded-full ">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ENG</span>
          </a>
        </div>
        <div class="pl-28">Admin: {{ Auth::user()->name }}</div>



        <div>
          <ul class="flex justify-center items-center gap-4">
            <li>
              <a href="/admin" class="block py-2 pl-3 pr-4 text-[#F16B07] hover:text-[#ab4c04]  rounded" aria-current="page">Dashboard</a>
            </li>
            <div>

            </div>
            <div>
              <!-- Dropdown  -->
              <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black hover:text-[#ab4c04]  font-medium rounded-lg text-lg px-4 py-2.5 text-center inline-flex items-center" type="button">Gérer<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
              <!-- Dropdown menu -->
              <div id="dropdown" class="absolute top-16  z-100 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                  <li>
                    <a href="/admin/users" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">les utilisateurs</a>
                  </li>
                  <li>
                    <a href="/admin/units" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">les unités</a>
                  </li>

                  <li>
                    <a href="/admin/produits" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">les produits</a>
                  </li>
                  <li>
                    <a href="{{ route('familles.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Les familles</a>
                  </li>
                  <li>
                    <a href="{{ route('activites.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Les Activites</a>
                  </li>

                </ul>
              </div>
            </div>


            <a href="#" class="pr-4 text-gray-900 rounded hover:bg-[#af540e]">
              <a class="bg-[#F16B07] text-white p-2 pr-4 pl-4 rounded-full hover:bg-[#af540e]" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
              </form>
            </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    {{-- <form action="{{ route('controle-de-gestion.index') }}" method="GET"class="bg-[#F3F6F9] flex justify-around p-4">


    <label for="date">Filter by date:</label>
    <input type="date" name="date" value="{{ request('date') }}">
    <label for="produit_id">Filter by product ID:</label>
    <input type="number" name="produit_id" value="{{ request('produit_id') }}">
    <label for="unit_id">Filter by unit ID:</label>
    <input type="number" name="unit_id" value="{{ request('unit_id') }}">
    <button class=" bg-[#F16B07] text-white p-2 pr-4 pl-4 rounded-full hover:bg-[#af540e] w-24" type="submit">Filter</button>
    </form> --}}
    {{-- <form method="get" action="{{ route('admin.index') }}">
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" value="{{ $selectedDate
      }}"
      min="2021-01-01" max="2021-12-31">
      <button type="submit">Filter</button>
    </form>
     --}}
     
    <center>
      <h1 class=" flex justify-between text-3xl">{{ now()->format('Y-m-d') }}</h1>
      <form method="GET">
        <label for="selected_date">Filter by date:</label>
        <input type="date" id="selected_date" name="selected_date" value="{{ $selectedDate }}">
        <br><br>
        <button class="bg-[#F16B07] text-white p-2 pr-4 pl-4 rounded-full hover:bg-[#af540e]" type="submit" name="submit" value="selected_date">Filter</button>
        <br><br>
        <button class="bg-[#F16B07] text-white p-2 pr-4 pl-4 rounded-full hover:bg-[#af540e]" type="submit" name="cumule" value="cumule">Cumule</button>
      </form>
      
        
    </form>
      <div class="w-full p-2 overflow-hidden rounded-lg shadow-xs pt-5">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr class="text-xs font-medium tracking-wide text-left text-gray-700 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  <th class="px-4 py-3 ">Activité</th>
                  <th class="px-4 py-3 ">Unité</th>
                  <th class="px-4 py-3 bg-red-500">More</th>
                  <th class="px-4 py-3 bg-orange-200">Previsions Production</th>
                  <th class="px-4 py-3 bg-orange-200">Réalisations Production</th>
                  <th class="px-4 py-3 bg-red-400">Taux Production</th>
                  <th class="px-4 py-3 bg-blue-200">Previsions Vente</th>
                  <th class="px-4 py-3 bg-blue-200">Réalisations Vente</th>
                  <th class="px-4 py-3 bg-blue-400">Taux Vente</th>
                  <th class="px-4 py-3 bg-green-200">Previsions Production Vendue</th>
                  <th class="px-4 py-3 bg-green-200">Réalisations Production Vendue</th>
                  <th class="px-4 py-3 bg-green-500">Taux Production Vendue</th>

                </tr>
              </thead>


              <tbody class="bg-white divide-y">
                @if ($activities)
                @foreach ($activities as $activity)
                <tr>
                  <td rowspan="{{ count($activity->units) + 1 }}">{{ $activity->name }}</td>
                  
                </tr>

                @foreach ($activity->units as $unit)
                <tr>
                  <td>{{ $unit->name }}</td>
          
                  <td>
                    <a href="{{ url('/admin/show?selected_date=' . $selectedDate . '&unit_id=' . $unit->id) }}">Show</a>
                  </td>
                  
                
                  <td>{{ $journalTotals[$unit->id]['Previsions_Production'] }}</td>
                  <td>{{ $journalTotals[$unit->id]['Realisation_Production'] }}</td>
                  {{-- <td class=" py-3{{ ($journalTotals[$unit->id]['Realisation_Production'] / $journalTotals[$unit->id]['Previsions_Production']) < 0.5 ? ' bg-red-500' : '' }}">{{ ($journalTotals[$unit->id]['Realisation_Production'] / $journalTotals[$unit->id]['Previsions_Production'])*100 }}</td> --}}

                  <td>{{ $journalTotals[$unit->id]['Previsions_Vent'] }}</td>
                  <td>{{ $journalTotals[$unit->id]['Realisation_Vent'] }}</td>
                  {{-- <td class=" py-3{{ ($journalTotals[$unit->id]['Realisation_Vent'] / $journalTotals[$unit->id]['Previsions_Vent']) < 0.5 ? ' bg-red-500' : '' }}">{{ ($journalTotals[$unit->id]['Realisation_Vent'] / $journalTotals[$unit->id]['Previsions_Vent'])*100 }}</td> --}}

                  <td>{{ $journalTotals[$unit->id]['Previsions_ProductionVendue'] }}</td>
                  <td>{{ $journalTotals[$unit->id]['Realisation_ProductionVendue'] }}</td>
                  {{-- <td class=" py-3{{ ($journalTotals[$unit->id]['Realisation_ProductionVendue'] / $journalTotals[$unit->id]['Previsions_ProductionVendue']) < 0.5 ? ' bg-red-500' : '' }}">{{ ($journalTotals[$unit->id]['Realisation_ProductionVendue'] / $journalTotals[$unit->id]['Previsions_ProductionVendue'])*100 }}</td> --}}
                </tr>
                @endforeach

                <tr>
                  <td class="bg-amber-300">Total</td>
                  <td></td>
                  <td></td>
                  <td class="bg-amber-300">{{ $activity->units->sum(function ($unit) use ($journalTotals) { return $journalTotals[$unit->id]['Previsions_Production']; }) }}</td>
                  <td class="bg-amber-300">{{ $activity->units->sum(function ($unit) use ($journalTotals) { return $journalTotals[$unit->id]['Realisation_Production']; }) }}</td>
                  {{-- <td class="bg-amber-300">{{ $activity->units->sum(function ($unit) use ($journalTotals) { return ($journalTotals[$unit->id]['Realisation_Production'] / $journalTotals[$unit->id]['Previsions_Production'])*100 ; }) }}</td> --}}
                  
                  
                  <td class="bg-amber-300">{{ $activity->units->sum(function ($unit) use ($journalTotals) { return $journalTotals[$unit->id]['Previsions_Vent']; }) }}</td>
                  <td class="bg-amber-300">{{ $activity->units->sum(function ($unit) use ($journalTotals) { return $journalTotals[$unit->id]['Realisation_Vent']; }) }}</td>
                  {{-- <td class="bg-amber-300">{{ $activity->units->sum(function ($unit) use ($journalTotals) { return ($journalTotals[$unit->id]['Realisation_Vent'] / $journalTotals[$unit->id]['Previsions_Vent'])*100; }) }}</td> --}}
                  
                  <td class="bg-amber-300">{{ $activity->units->sum(function ($unit) use ($journalTotals) { return $journalTotals[$unit->id]['Previsions_ProductionVendue']; }) }}</td>
                  <td class="bg-amber-300">{{ $activity->units->sum(function ($unit) use ($journalTotals) { return $journalTotals[$unit->id]['Realisation_ProductionVendue']; }) }}</td>
                  {{-- <td class="bg-amber-300">{{ $activity->units->sum(function ($unit) use ($journalTotals) { return ($journalTotals[$unit->id]['Realisation_ProductionVendue'] / $journalTotals[$unit->id]['Previsions_ProductionVendue'])*100; }) }}</td> --}}
                  
                </tr>
                @endforeach

                @endif
              </tbody>
            </table>
        </div>
      </div>
    </center>



  </div>
  <script>
    const tooltips = document.querySelectorAll('[data-tooltip-target]');
  
    tooltips.forEach((tooltip) => {
      const target = document.getElementById(tooltip.dataset.tooltipTarget);
      const popperInstance = Popper.createPopper(tooltip, target, {
        placement: tooltip.dataset.tooltipPlacement,
        modifiers: [
          {
            name: 'offset',
            options: {
              offset: [0, 8],
            },
          },
          {
            name: 'preventOverflow',
            options: {
              boundary: document.body,
            },
          },
        ],
      });
  
      function showTooltip() {
        target.classList.add('opacity-100');
        target.classList.remove('invisible');
      }
  
      function hideTooltip() {
        target.classList.remove('opacity-100');
        target.classList.add('invisible');
      }
  
      tooltip.addEventListener('mouseenter', () => {
        showTooltip();
      });
  
      tooltip.addEventListener('focus', () => {
        showTooltip();
      });
  
      tooltip.addEventListener('mouseleave', () => {
        hideTooltip();
      });
  
      tooltip.addEventListener('blur', () => {
        hideTooltip();
      });
    });
  
    const dropdownToggle = document.querySelector('[data-dropdown-toggle]');
    const dropdownMenu = document.getElementById('dropdown');

    // Hide the dropdown menu by default
    dropdownMenu.classList.add('hidden');

    // Toggle the dropdown menu on hover
    dropdownToggle.addEventListener('mouseover', function() {
      dropdownMenu.classList.toggle('hidden');
    });


    // Hide the dropdown menu when the mouse leaves the dropdown menu
    dropdownMenu.addEventListener('mouseleave', function() {
      dropdownMenu.classList.add('hidden');
    });
  </script>

</body>

</html>