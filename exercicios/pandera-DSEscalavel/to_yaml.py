import pandera as pa

from pandera import Column, Check
from pathlib import Path

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


yaml_schema = schema.to_yaml()
f = Path("schema.yml")
f.touch()
f.write_text(yaml_schema)
