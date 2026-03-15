<h2>Thêm sách</h2>

<form method="post">
    <label for="title">Tên sách</label>
    <input type="text" name="title" id="title" required placeholder="Title">

    <label for="author">Tên tác giả</label>
    <input type="text" name="author" id="author" required placeholder="Author">

    <label for="price">Giá</label>
    <input type="number" name="price" id="price" required placeholder="Price" min="0">

    <label for="stock">Số lượng</label>
    <input type="number" name="stock" id="stock" required placeholder="Stock" min="0">

    <label for="description">Chi tiết</label>
    <textarea name="description" id="description" required placeholder="Description"></textarea>

    <button type="submit">Thêm sách</button>
</form>