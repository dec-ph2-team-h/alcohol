<!-- resources/views/alcohol/input.blade.php -->

<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          
          <form method="POST" action="{{ route('input') }}">
            @csrf
            <!--  基準のお酒プルダウン -->
            <div class="flex flex-col mb-4">
                <label class="font-bold text-lg text-grey-darkest" for="based_alcohol_id">基準のお酒</label>
                <select class="form-conol" id="based_alcohol_id" name="based_alcohol_id">
                    @foreach ($alcohols as $alcohol)
                        <option value="{{ $alcohol->id }}">{{ $alcohol->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-4">
              <label class="font-bold text-lg text-grey-darkest" for="based_cups">杯</label>
              <input class="border py-2 px-3 text-grey-darkest" type="number" min="1" name="based_cups" id="based_cups">
            </div>

            <!--  変換するお酒プルダウン -->
            <div class="flex flex-col mb-4">
                <label class="font-bold text-lg text-grey-darkest" for="target_alcohol_id">{{ __('変換するお酒') }}</label>
                <select class="form-control" id="target_alcohol_id" name="target_alcohol_id">
                    @foreach ($alcohols as $alcohol)
                        <option value="{{ $alcohol->id }}">{{ $alcohol->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- フレーズをAlcoholControllerに送りたい やっぱとりあえずあらかじめ入れてるテーブルのフレーズを表示するためには使わんかったわ--}}
            {{-- <div class="flex flex-col mb-4">
              <label class="font-bold text-lg text-grey-darkest" for="phrase">杯</label>
              <input class="border py-2 px-3 text-grey-darkest" type="hidden" name="phrase" id="phrase" value="$alcohols->phrase">
            </div> --}}

            <button type="submit" class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              変換
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

