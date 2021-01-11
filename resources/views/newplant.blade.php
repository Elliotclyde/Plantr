@extends('layouts.main')

@section('title','New plant')

@section('content')
<h1 class="hidden-heading">New Plant</h1>

<form class="new-plant-form" action="{{ route('newplant') }}" method="post" x-data="{planted:'{{(new \Carbon\Carbon())->tz('Pacific/Auckland')->format('Y-m-d')}}',selected:'{{ $planttypes[0]->type }}'}">
    @csrf
    <p class="label">Choose Plant</p>
    <div class="plant-type-container animwrapper">
        <div class="plant-type-display-container" >

            <!-- Input (on left side on wider screens) -->
            <fieldset x-model="selected" class="plant-type-input-container">
                @foreach($planttypes as $option)
                    <input class="plant-type-radio" id="{{ $option->type . "-radio" }}"
                        type="radio" name="type" value="{{ $option->type }}"
                @if($option->type===$planttypes[0]->type)
                    checked
                @endif
                >
                <label for="{{ $option->type . "-radio" }}" class="plant-type-label"
                    aria-label={{ $option->type }}>
                    @svg($option->svg_path . 3)
                </label>
                @endforeach
            </fieldset>
            <!-- Display of plant with tips -->
            <div class="plant-display">
                <p class="plant-display-title" x-text="selected.charAt(0).toUpperCase() + selected.slice(1)"></p>
                <!-- SVG-ofplants -->
                @foreach($planttypes as $index => $option)
                    <div class="plant-display-item-wrapper" x-ref="{{ $option->type }}"
                        data-plant="{{ $option->type }}"
                        x-show="selected===$refs.{{ $option->type }}.dataset.plant">
                        @svg($option->svg_path .'3',["class"=>"plant-display-item"])
                            <p class="growing-tip">
                                {{ trim(json_decode($option->tips)[rand(0,count(json_decode($option->tips))-1)]) }}
                            </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="animwrapper planted-wrapper">
    <label for="planted">Select date of planting</label>
    <input type="date" name="planted" id="planted" x-model.date="planted">
    
    <p class="date-message" x-bind:class="{ 'bad-time': !checkSeason(selected,planted)}"  id="date-message" data-planting-times='{
        @foreach($planttypes as $index => $option)
            "{{$option->type}}":{ "seasonstart":{{$option->seasonstart-1}},
            "seasonend":{{$option->seasonend-1}}} @if($index!=count($planttypes)-1),@endif
        @endforeach
    }' x-text="checkSeason(selected,planted)?
    'This is a good time to plant '+selected:
    'This is not such a good time to plant '+selected "></p>
    </div>
    <div class="animwrapper quantity-wrapper">
    <label for="quantity">Select how many plants</label>
    <input  type="number" name="quantity" id="quantity" step="1" value="1" min="1" max="100">
    </div>
    <div class="animwrapper prop-type-wrapper">
    <p class="label">Choose planting method</p>
    <fieldset class="prop-type-input-container">
        <input class="prop-type-radio" id="directsow" type="radio" name="propogation_type" value="directsow" checked>
        <label for="directsow" class="prop-type-label" aria-label="directsow">
            @svg('proptypes.direct-sew')
                <p class="prop-type">Sow directly</p>

        </label>
        <input class="prop-type-radio" id="seedling" type="radio" name="propogation_type" value="seedling">
        <label for="seedling" class="prop-type-label" aria-label="seedling">
            @svg('proptypes.seedling')
                <p class="prop-type">Plant seedling</p>
        </label>
        <input class="prop-type-radio" id="proptray" type="radio" name="propogation_type" value="proptray">
        <label for="proptray" class="prop-type-label" aria-label="proptray">
            @svg('proptypes.prop-tray')
                <p class="prop-type">Sow in tray</p>
        </label>
    </fieldset>
    </div>
    <input class="round-btn" type="submit">
<a class="round-btn cancel-btn" href="{{route('dashboard')}}">Cancel</a>
</form>


@endsection
