@extends('controle-de-gestion.layout')

@section('create')
    <center>
     

@foreach ($units as $unit)
  <input type="hidden" name="unit_id[]" value="{{ $unit->id }}">
    <table>
        <thead>
            <tr>
                {{-- <th>Produit</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($unit->activites as $activite)
                <tr>
                    {{-- <td colspan="1" hidden>{{ $activite->name }}</td> --}}
                </tr>
                @foreach ($activite->familles as $famille)
                    <tr>
                        {{-- <td colspan="1" hidden>{{ $famille->name }}</td> --}}
                    </tr>
                    @foreach ($famille->produits as $produit)
                        <tr>
                            {{-- <td>{{ $produit->name }}</td> --}}
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
@endforeach 

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
@if(session('success'))
<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold">Our privacy policy has changed</p>
      <p class="text-sm">'Journal crée avec succès.'</p>
    </div>
  </div>
</div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif






                            <form action="{{ route('controle-de-gestion.store') }}" method="POST">
                                @csrf
                                <select name="unit_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-max p-3" hidden>
                                  <option value="{{ $unit->id }}" selected class="hidden">{{ $unit->id }}</option>
                                </select>
                                <div class="flex flex-col">
                                    <label class="mb-1 font-bold text-lg text-gray-700" for="date">Date</label>
                                    <input class="mx-auto text-center border border-gray-400 py-2 px-3 text-gray-700 w-48" type="date" name="date" id="date" placeholder="<?=Date('j-n-Y')?>" value="{{ old('date') }}">
                                    @error('date')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                   
 
                                <center>
                                  <div class="relative overflow-x-auto pt-20 px-4">
                                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                          <thead class="text-xs text-gray-700 uppercase bg-red-50 dark:bg-gray-700 dark:text-gray-400">
                                              <tr>
                                                  <th scope="col" class="px-6 py-3">
                                                      Nom Produit
                                                  </th>
                                                  <th scope="col" class="px-6 py-3">
                                                      Previsions Production
                                                  </th>
                                                  <th scope="col" class="px-6 py-3">
                                                      Realisation Production
                                                  </th>
                                                  <th scope="col" class="px-6 py-3">
                                                      Previsions Vent
                                                  </th>
                                                  <th scope="col" class="px-6 py-3">
                                                      Realisation Vent
                                                  </th>
                                                  <th scope="col" class="px-6 py-3">
                                                      Previsions Production Vendue
                                                  </th>
                                                  <th scope="col" class="px-6 py-3">
                                                      Realisation Production Vendue
                                                  </th>
                                                  
                                              </tr>
                                          </thead>
                                          <tbody>
                                            
                                            {{-- <tr><input type="hidden" name="unit_id" value="{{ Auth::user()->units->first()->id }}">
                                            </tr> --}}
                                      @foreach ($unit->activites as $activite)
                                          @foreach ($activite->familles as $famille)
                                              @foreach ($famille->produits as $produit)
                                                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                   
                                                    <input type="hidden" name="produit_id[]" value="{{ $produit->id }}">
                                                      <td class="px-6 py-4">{{ $produit->name }}</td>
                                                      <td class="px-6 py-4">
                                                          <input type="number" name="Previsions_Production[]" class="w-full bg-transparent border-none" placeholder="Previsions Production">
                                                      </td>
                                                      <td class="px-6 py-4">
                                                          <input type="number" name="Realisation_Production[]" class="w-full bg-transparent border-none" placeholder="Realisation Production">
                                                      </td>
                                                      <td class="px-6 py-4">
                                                          <input type="number"  name="Previsions_Vent[]" class="w-full bg-transparent border-none" placeholder="Previsions Vent">
                                                      </td>
                                                      <td class="px-6 py-4">
                                                          <input type="number"  name="Realisation_Vent[]" class="w-full bg-transparent border-none" placeholder="Realisation Vent">
                                                      </td>
                                                      <td class="px-6 py-4">
                                                          <input type="number" name="Previsions_ProductionVendue[]" class="w-full bg-transparent border-none" placeholder="Previsions Production Vendue">
                                                      </td>
                                                      <td class="px-6 py-4">
                                                          <input type="number" name="Realisation_ProductionVendue[]" class="w-full bg-transparent border-none" placeholder="Realisation Production Vendue">
                                                      </td>
                                                      
                                                  </tr>
                                              @endforeach
                                          @endforeach
                                      @endforeach
                                  </tbody>
                                  
                                      </table>
                                  </div>
                                  
                                  </center>
                                  <div class="flex flex-col">
                                    <label class="mb-1 font-bold text-lg text-gray-700" for="date">Description</label>
                                  
                                     <textarea type="text" name="description" class="mx-auto text-center border border-gray-400 py-2 px-3 text-gray-700 w-96" placeholder="Description"></textarea>
                                     @error('description')
                                         <div class="text-red-500 mt-2 text-sm">
                                             {{ $message }}
                                         </div>
                                     @enderror
                                     
                                   
                                 </div>
                                <div class="flex justify-center items-center gap-6 mt-4">
                                  <button type="submit" onclick="submitForm()" id="submit-all" class="bg-[#F16B07] rounded-xl w-2/4 h-11 text-lg text-white hover:bg-[#a44a06]" onclick="return confirm('Are you sure you want to submit the form?')">Submit</button>
                                  
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </center>
@endsection
