<!-- resources/views/alcohol/input.blade.php -->

<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          

            @csrf
            <!--  基準のお酒プルダウン -->
            <div class="flex flex-col mb-4">
                <label class="font-bold text-lg text-grey-darkest" for="alcohol-id">基準のお酒<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                <select class="form-conol" id="alcohol-id" name="alcohol_id">
                    @foreach ($alcohols as $alcohol)
                        <option value="{{ $alcohol->id }}">{{ $alcohol->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-4">
              <label class="font-bold text-lg text-grey-darkest" for="amount">杯<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
              <input class="border py-2 px-3 text-grey-darkest" type="number" min="0" name="amount" id="amount">
            </div>

            <!--  変換するお酒プルダウン -->
            <div class="flex flex-col mb-4">
                <label class="font-bold text-lg text-grey-darkest" for="alcohol-id">{{ __('変換するお酒') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                <select class="form-control" id="alcohol-id" name="alcohol_id">
                    @foreach ($alcohols as $alcohol)
                        <option value="{{ $alcohol->id }}">{{ $alcohol->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              変換
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

