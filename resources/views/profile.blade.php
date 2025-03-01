<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    /* صندوق النموذج */
    .profile-container {
        background: #fff;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 600px;
        text-align: center;
    }

    /* عنوان النموذج */
    .profile-container h2 {
        margin-bottom: 15px;
        color: #333;
    }

    /* تنسيق الحقول */
    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        background: #f9f9f9;
    }

    /* زر الحفظ */
    .btn-submit {
        background: #28a745;
        color: white;
        border: none;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background: #218838;
    }

    /* تنسيق الصورة */
    .profile-image {
        display: block;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 10px auto;
        object-fit: cover;
        border: 3px solid #ddd;
    }
</style>
</head>
<body>
    <div class="profile-container">
        <h2>Profile</h2>
        <form id="profile-form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="post">
            <img id="profile-avatar" src="{{ asset('storage/' . $profile->avatar) }}" alt="Profile Avatar" class="profile-image" width="150">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="{{ $profile->name }}" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="{{ $profile->email }}" required>
            </div>

            <div class="form-group">
                <label>Bio:</label>
                <textarea name="bio">{{ $profile->bio }}</textarea>
            </div>

            <div class="form-group">
                <label>Address:</label>
                <input type="text" name="address" value="{{ $profile->address }}" required>
            </div>

            <div class="form-group">
                <label>Phone Number:</label>
                <input type="text" name="phone_number" value="{{ $profile->phone_number }}" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <select name="gender" required>
                    <option value="male" {{ $profile->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $profile->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label>Birthdate:</label>
                <input type="date" name="birthdate" value="{{ $profile->birthdate }}" required>
            </div>

            <div class="form-group">
                <label>Profile Picture:</label>
                <input type="file" name="avatar">
            </div>

            <button type="submit" class="btn-submit">Save Changes</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
