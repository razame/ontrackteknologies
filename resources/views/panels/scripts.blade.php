{{-- Vendor Scripts --}}
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}" defer></script>
<script src="{{ asset(mix('js/scripts/components.js')) }}"></script>



@if($configData['blankPage'] == false)
  <script src="{{ asset(mix('js/scripts/footer.js')) }}"></script>
@endif
{{-- page script --}}
@yield('page-script')

<script src="{{ asset('js/t-datepicker.min.js')}}"></script>
<script src="{{ asset('js/custom.js') }}?version=2020"></script>



