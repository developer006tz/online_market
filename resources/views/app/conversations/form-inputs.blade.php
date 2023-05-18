@php $editing = isset($conversation) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="post_id" label="Post" required>
            @php $selected = old('post_id', ($editing ? $conversation->post_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Post</option>
            @foreach($posts as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="seller_id" label="User" required>
            @php $selected = old('seller_id', ($editing ? $conversation->seller_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="customer_id"
            label="Customer Id"
            :value="old('customer_id', ($editing ? $conversation->customer_id : ''))"
            maxlength="255"
            placeholder="Customer Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
