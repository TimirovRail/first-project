<div class="product-display">
    <div class="product-card">
        <h2>{{ $product['name'] }}</h2>
        <p>Cost: {{ $product['cost'] }}</p>
        <p>Amount: {{ $product['amount'] > 0 ? $product['amount'] : 'Нет в наличии' }}</p>
    </div>
</div>

<style>

.product-display {
    display: flex;
    flex-wrap: nowrap;
    gap: 20px;
    overflow-x: auto; 
    padding: 20px;
    background-color: #f9f9f9;
    white-space: nowrap;
}

.product-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    padding: 20px;
    width: 250px; 
    text-align: center;
    flex-shrink: 0;
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: scale(1.05); 
}

.product-card h2 {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 10px;
}

.product-card p {
    font-size: 1rem;
    color: #666;
    margin: 5px 0;
}

.product-card p:last-child {
    font-weight: bold;
    color: {{ $product['amount'] > 0 ? '#28a745' : '#dc3545' }};
}
</style>