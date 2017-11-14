select countryName from country,hotel,booking,traveler where 
country.countryID = hotel.countryID and 
booking.hotelID = hotel.hotelID and
traveler.travelerID = booking.travelerID and
traveler.travelerLastName = 'Clooney';