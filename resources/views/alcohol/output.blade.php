<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">
                <!-- foreach($alcohols as $alcohol) -->
                <!-- {alcohol->name}↓ -->
                <h2>の</h2> <br>
                <!-- 入力結果 -->
                <h2>杯は</h2><br>
                <!-- 計算結果↓ -->
                <h2>杯分です</h2><br>
                <!-- endforeach -->
            </div>
            <div class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">
                <!-- foreach($alcohols as $value)
                <ul>
                    {value->prase}
                    <li>かっこいい言葉</li><br>
                    <li>かっこいい言葉</li><br>
                    <li>かっこいい言葉</li><br>
                </ul>
                endforeach -->
            </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>