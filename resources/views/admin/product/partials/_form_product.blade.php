
<div id="row_form">
    <div class="row">
        <div class="col-6">
            <x-input name="name" label="Name" :value="$viewData['product']->name ?? ''" />
        </div>
        <div class="col-6">
            <x-input name="price" label="Price" type="number" :value="$viewData['product']->price ?? ''"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <x-text-area name="description" label="Description" :value="$viewData['product']->description ?? ''"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <x-input name="image" label="Image" type="file" />
        </div>
    </div>
</div>