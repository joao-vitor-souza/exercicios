import pandas as pd
import pandera as pa

from pandera.typing import Series

fruits = pd.DataFrame(
    {
        "name": ["apple", "banana", "apple", "orange"],
        "store": ["Aldi", "Walmart", "Walmart", "Aldi"],
        "price": [4, 4, 4, 5],
    }
)

available_fruits = ["apple", "banana", "orange"]
nearby_stores = ["Aldi", "Walmart"]


class Schema(pa.SchemaModel):

    name: Series[str] = pa.Field(isin=available_fruits)
    store: Series[str] = pa.Field(isin=nearby_stores)
    price: Series[int] = pa.Field(le=4)

    @pa.check("price")
    def price_sum_lt_20(cls, price: Series[int]) -> Series[bool]:
        return sum(price) < 20


Schema.validate(fruits)
