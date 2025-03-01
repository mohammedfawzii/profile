<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <form id="profile-form" enctype="multipart/form-data">
        @csrf
        @method('post')
        <input type="text" name="name" value="{{ $profile->name }}">
        <input type="email" name="email" value="{{ $profile->email }}">
        <textarea name="bio">{{ $profile->bio }}</textarea>
        <input type="file" name="avatar">
        <button type="submit">Save Changes</button>
    </form>

    <script>
        document.getElementById('profile-form').addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            fetch("{{ route('profile.update', $profile->id) }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                }
            }).then(response => response.json())
            .then(data => alert(data.message))
            .catch(error => console.error('Error:', error));
        });
    </script>

</body>
</html>
