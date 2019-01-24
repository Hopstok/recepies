#!/bin/bash
set -e
set -x

TEMPLATE=$1
OUTPUT=$2
INPUT=$3

[ -f openapi-generator-cli.jar ] || wget http://central.maven.org/maven2/org/openapitools/openapi-generator-cli/3.3.4/openapi-generator-cli-3.3.4.jar -O openapi-generator-cli.jar

echo "Regenerating $OUTPUT from specification $INPUT" >> "/dev/stderr";
rm -rf "$OUTPUT"

java -jar ./openapi-generator-cli.jar generate \
  --input-spec "$INPUT" \
  --generator-name php-laravel \
  --output "$OUTPUT"