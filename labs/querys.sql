INSERT into user (first_name, address) VALUES (AES_ENCRYPT('Obama', 'usa2010'),AES_ENCRYPT('Obama', 'usa2010'));

SELECT AES_DECRYPT(first_name, 'usa2010'), AES_DECRYPT(address, 'usa2010') from user;
