<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="py-4 px-6 bg-grey-lightest uppercase text-lg text-grey-dark border-b border-grey-light">
                <table class="text-center w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">お酒を変換したよん</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @foreach ($tweets as $tweet) --}}
                    <tr class="hover:bg-grey-lighter">
                      <td class="py-4 px-6 border-b border-grey-light">
                        <h3 class="text-center text-lg text-grey-dark">{{$conversion_name['based_alcohol_name']}}の</h3>
                        <div class="flex">
                          <!-- 更新ボタン -->
                          <!-- 削除ボタン -->
                        </div>
                      </td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                      <td class="py-4 px-6 border-b border-grey-light">
                        <h3 class="text-center text-lg text-grey-dark">{{$conversion_name['based_cups']}}杯は</h3>
                        <div class="flex">

                        </div>
                      </td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                      <td class="py-4 px-6 border-b border-grey-light">
                        <h3 class="text-center text-lg text-grey-dark">{{$conversion_name['target_alcohol_name']}}を{{$target_cups}}杯分です</h3>
                        <div class="flex">

                        </div>
                      </td>
                    </tr>
                    {{-- @endforeach --}}
                  </tbody>
                </table>
            </div>
            {{-- 許容量バー --}}
            <div class="progress">
              {{-- <div class="progress-bar" style="width:25%" role="progressbar" aria-valuenow="25" aria-valuemin"0" aria-valuemax="100">25%</div> --}}
              <progress value={{$tolerance_ratio}} max='100'></progress>
            </div>

            <div class="py-4 px-6 bg-grey-lightest uppercase text-lg text-grey-dark border-b border-grey-light">
                <!-- foreach($alcohols as $value)
                <ul>
                    {value->prase}
                    <li>かっこいい言葉</li><br>
                    <li>かっこいい言葉</li><br>
                    <li>かっこいい言葉</li><br>
                </ul>
                endforeach -->
                <div class="py-4 px-6 bg-grey-lightest uppercase text-lg text-grey-dark border-b border-grey-light">
                <table class="text-center w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">{{$conversion_name['based_alcohol_name']}}を飲んだ後に言ったら女の子が落ちちゃうセリフ</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @foreach ($tweets as $tweet) --}}
                    <tr class="hover:bg-grey-lighter">
                      <td class="py-4 px-6 border-b border-grey-light">
                        <h3 class="text-center text-lg text-grey-dark">"{{$based_alcohol_phrase}}"</h3>
                        <div class="flex">
                          
                        </div>
                      </td>
                    </tr>
                    
                    {{-- @endforeach --}}
                  </tbody>
                </table>
            </div>

            </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>