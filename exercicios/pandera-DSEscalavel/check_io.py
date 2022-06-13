import pandas as pd
import pandera as pa

from pandera import Column, Check, check_io, infer_schema

fruits_nearby = pd.DataFrame(
    {
        "name": ["apple", "banana", "apple", "orange"],
        "store": ["Aldi", "Walmart", "Walmart", "Aldi"],
        "price": [2, 1, 3, 4],
    }
)

fruits_faraway = pd.DataFrame(
    {
        "name": ["apple", "banana", "apple", "orange"],
        "store": ["Whole Foods", "Whole Foods", "Schnucks", "Schnucks"],
        "price": [3, 2, 4, 5],
    }
)

in_schema = pa.DataFrameSchema({"store": Column(str)})

out_schema = pa.DataFrameSchema(
    {"store": Column(str, Check.isin(["Aldi", "Walmart", "Whole Foods", "Schnucks"]))}
)


@check_io(fruits_nearby=in_schema, fruits_faraway=in_schema, out=out_schema)
def combine_fruits(
    fruits_nearby: pd.DataFrame, fruits_faraway: pd.DataFrame
) -> pd.DataFrame:
    fruits = pd.concat([fruits_nearby, fruits_faraway])
    return fruits


combine_fruits(fruits_nearby, fruits_faraway)
