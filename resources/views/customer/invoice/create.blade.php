@extends('layouts.app')

@section('heading', 'Reminder Create')

@section('breadcrums')
<div class="hidden h-full py-1 sm:flex">
  <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
</div>
<ul class="hidden flex-wrap items-center space-x-2 sm:flex">
  <li class="flex items-center space-x-2">
    <a
      class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
      href="{{route('home')}}"
      >Dashboard</a
    >
    <svg
      x-ignore
      xmlns="http://www.w3.org/2000/svg"
      class="h-4 w-4"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M9 5l7 7-7 7"
      />
    </svg>
    <a
      class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
      href="{{route('tasks.index')}}"
      >Invoice</a
    >
    <svg
      x-ignore
      xmlns="http://www.w3.org/2000/svg"
      class="h-4 w-4"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M9 5l7 7-7 7"
      />
    </svg>
  </li>
  <li>Create</li>
</ul>
@endsection

@section('content')
<div class="card grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
  <div class="col-span-12">
    <div class=" p-4 sm:p-5">
      <p
        class="text-base font-medium text-slate-700 dark:text-navy-100"
      >
        Invoice Create
      </p>
      <form method="post" action="{{route('invoices.store')}}">
        @csrf
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <label class="block">
              <span>Customer</span>
              <select
                class="select2 form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent
                @error('customer_id')
                border-error
                @enderror"
                name="customer_id"
                required
              >
              @foreach($customers as $customer)
                <option value="{{$customer->id}}" @selected(old('customer_id',0)==$customer->id)>{{$customer->customer_name}}</option>
              @endforeach
              </select>
              @error('customer_id')
                <span class="text-tiny+ text-error">{{$message}}</span>
              @enderror
            </label>
          </div>
          <div class="grid mt-2 grid-cols-1 gap-4 sm:grid-cols-12">
            <label class="block sm:col-span-6">
              <span>Product Name</span>
              <span class="relative mt-1.5 flex">
                <input
                  class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent 
                  @error('product_name')
                  border-error
                  @enderror"
                  placeholder="Product Name"
                  name="product_name"
                  type="text"
                  value="{{old('product_name')}}"
                  required
                />
              </span>
              @error('product_name')
                <span class="text-tiny+ text-error">{{$message}}</span>
              @enderror
            </label>
            <label class="block sm:col-span-2">
              <span>Product Qty</span>
              <span class="relative mt-1.5 flex">
                <input
                  class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent 
                  @error('product_qty')
                  border-error
                  @enderror"
                  placeholder="Product Qty"
                  name="product_name"
                  type="number"
                  step="1"
                  min="1"
                  value="{{old('product_qty')}}"
                  required
                />
              </span>
              @error('product_qty')
                <span class="text-tiny+ text-error">{{$message}}</span>
              @enderror
            </label>
            <label class="block sm:col-span-4">
              <span>Product Price</span>
              <span class="relative mt-1.5 flex">
                <input
                  class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent 
                  @error('product_price')
                  border-error
                  @enderror"
                  placeholder="Product Price"
                  name="product_price"
                  type="number"
                  step="0.01"
                  min="1"
                  value="{{old('product_price')}}"
                  required
                />
              </span>
              @error('product_name')
                <span class="text-tiny+ text-error">{{$message}}</span>
              @enderror
            </label>
          </div>

          <label class="block mt-2 sm:col-span-4">
            <span>Invoice Description</span>
            <span class="relative mt-1.5 flex">
              <textarea
                rows="4"
                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent 
                @error('product_price')
                border-error
                @enderror"
                placeholder="Invoice Description"
                name="description"
                required
              >{{old('description')}}</textarea>
            </span>
            @error('product_name')
              <span class="text-tiny+ text-error">{{$message}}</span>
            @enderror
          </label>

          <label class="block mt-2">
            <span>Payment Method</span><br>
            <label class="inline-flex items-center space-x-2 pt-2">
              <input
                checked
                class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                name="payment_method"
                value="0"
                @checked(old('payment_method',0)==0)
                type="radio"
              />
              <span>Offline</span>
            </label>
            <label class="inline-flex items-center space-x-2 pt-2">
              <input
                class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                name="payment_method"
                value="1"
                @checked(old('payment_method',0)==1)
                type="radio"
              />
              <span>Credit Card</span>
            </label>
            <label class="inline-flex items-center space-x-2 pt-2">
              <input
                class="form-radio is-basic h-5 w-5 rounded-full border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                name="payment_method"
                value="2"
                @checked(old('payment_method',0)==2)
                type="radio"
              />
              <span>Debit Card</span>
            </label>
            @error('payment_method')
              <span class="text-tiny+ text-error">{{$message}}</span>
            @enderror
          </label>

          <div id="payment_fields" style="display: none;">
            <div class="grid mt-2 grid-cols-1 gap-4 sm:grid-cols-4">
              <label class="block mt-2 sm:col-span-2">
                <span>Name on card</span>
                <span class="relative mt-1.5 flex">
                  <input
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent 
                    @error('name_on_card')
                    border-error
                    @enderror"
                    placeholder="Name on card"
                    name="name_on_card"
                    type="text"
                    value="{{old('name_on_card')}}"
                    required
                  />
                </span>
                @error('name_on_card')
                  <span class="text-tiny+ text-error">{{$message}}</span>
                @enderror
              </label>
              <label class="block mt-2 sm:col-span-2">
                <span>Card Number</span>
                <span class="relative mt-1.5 flex">
                  <input
                    x-input-mask="{
                        numeric:true,
                        blocks: [4, 4, 4, 4],
                    }"
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent 
                    @error('card_number')
                    border-error
                    @enderror"
                    placeholder="Card Number"
                    name="card_number"
                    type="text"
                    value="{{old('card_number')}}"
                    required
                  />
                </span>
                @error('card_number')
                  <span class="text-tiny+ text-error">{{$message}}</span>
                @enderror
              </label>
              <label class="block mt-2 sm:col-span-2">
                <span>Expiry Date</span>
                <span class="relative mt-1.5 flex">
                  <input
                    x-input-mask="{
                      numericOnly: true, 
                      blocks: [2, 2], 
                      delimiters: ['/']
                    }"
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent 
                    @error('expiry_date')
                    border-error
                    @enderror"
                    placeholder="Expiry Date"
                    name="expiry_date"
                    type="text"
                    value="{{old('expiry_date')}}"
                    required
                  />
                </span>
                @error('expiry_date')
                  <span class="text-tiny+ text-error">{{$message}}</span>
                @enderror
              </label>
              <label class="block mt-2 sm:col-span-2">
                <span>Security Code</span>
                <span class="relative mt-1.5 flex">
                  <input
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent 
                    @error('security_code')
                    border-error
                    @enderror"
                    placeholder="Card Number"
                    name="security_code"
                    type="number"
                    min="0"
                    max="9999"
                    value="{{old('security_code')}}"
                    required
                  />
                </span>
                @error('security_code')
                  <span class="text-tiny+ text-error">{{$message}}</span>
                @enderror
              </label>
            </div>
          </div>

          <div class="flex justify-end mt-2 space-x-2">
            <button
              class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
              type="submit"
            >
              <span>Submit</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function(){
    $('input[name="payment_method"]').click(function(e){
      if($(this).val()==0)
        $('#payment_fields').slideUp('slow');
      else
        $('#payment_fields').slideDown('slow');
    });
  });
</script>
@endpush