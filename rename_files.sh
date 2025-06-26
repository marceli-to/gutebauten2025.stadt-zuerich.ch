#!/bin/bash

# Script to rename files from *-start* to *-card*
# Navigate to the public/media directory
cd /Users/marceli.to/Jamon.digital/Webroot/gutebauten2025.stadt-zuerich.ch/public/media

# Find all files with -start in their name and rename them
find . -type f -name "*-start*" | while read file; do
  # Get the new filename by replacing -start with -card
  newfile=$(echo "$file" | sed 's/-start/-card/g')
  
  # Rename the file
  mv "$file" "$newfile"
  
  # Print what was done
  echo "Renamed: $file → $newfile"
done

echo "Renaming complete!"
