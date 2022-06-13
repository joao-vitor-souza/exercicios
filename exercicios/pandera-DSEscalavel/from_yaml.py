from pandera.io import from_yaml
from pathlib import Path

f = Path("schema.yml")

with f.open() as file:
    yaml_schema = file.read()

schema = from_yaml(yaml_schema)

print(type(schema))
