# SQL export of the Game of Stakes database

Contains data from:

- GoS up until block `11442`
- GoS3 up until block `330000`
- GoS5 up until block `114240`
- GoS6 up until block `38900`

## Reconstructing the Database

We had to split the database to upload it on github. Here is how to rebuild it. 

### Using Winrar

Just download the different parts in the `./winrar` folder and rebuild using `Winrar`.

### Using `gunzip`

Just use the following command:

```
cat gunzip/gos.sql.gz.* | gunzip > gos.sql
```

## SHA256 of files

f570d561f1d184a1d0e7c9f0ed12239130b0bc03936ed51aa80e0fddc4d9e22c  gos.sql.gz
443dfcfe87db6b1e083ed859bfc485b359b12536a46229535557ca5ec2a7bf71  gos.sql.gz.aa
bc969795405d38116a111ac9e141f41d9f7a12d3241e030cf4a51a086b509287  gos.sql.gz.ab
0914ec5e13b96f94cfce636a48018e3e07ab83429542d109b45f80d8820c6626  gos.sql.gz.ac
5a6a53c693f6616bf7b5c104cbc60f541a022a1c254eb6afcc81f9c7044ee4d6  gos.sql.gz.ad
9a8f24d811816ead6e73ef24c1a6f463ee8d11717d765013b93be4b7f76580c1  gos.sql.gz.ae
79efe2ec3de0e2a2adaf5a051b05464cf6c4bb0ec28e5d00f4eef4f213fa150e  gos.sql.gz.af
df7cadb9ffb373f4e249786be5c9a8d85c5668e19f39e914e479432b7da92528  gos.sql
