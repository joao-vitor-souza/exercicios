import pandas as pd
import pandera as pa
from numpy import nan

from pandera import Column, Check, check_input
from pathlib import Path

fruits = pd.DataFrame(
    {
        "name": ["apple", "banana", "apple", "orange"],
        "store_nearby": ["Aldi", "Walmart", "Walmart", nan],
        "store_faraway": ["Whole Foods", "Schnucks", "Whole Foods", "Schnucks"],
        "price": ["2", "1", "3", 4],
    }
)

available_fruits = ["apple", "banana", "orange"]
nearby_stores = ["Aldi", "Walmart", "Whole Foods", "Schnucks"]

schema = pa.DataFrameSchema(
    {
        "name": Column(str, Check.isin(available_fruits)),
        "store_+": Column(
            str, Check.isin(nearby_stores), nullable=True, unique=False, regex=True
        ),
        "price": Column(
            int,
            [Check.less_than(10), Check(lambda price: sum(price) < 20)],
            coerce=True,
        ),
    }
)


@check_input(schema)
def get_total_price(fruits: pd.DataFrame) -> int:
    return fruits.price.sum()


get_total_price(fruits)
