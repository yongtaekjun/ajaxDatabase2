select countryName from country INNER JOIN
hotel on country.countryID = hotel.countryID INNER JOIN
booking on booking.hotelID = hotel.hotelID INNER JOIN
traveler on traveler.travelerID = booking.travelerID and traveler.travelerLastName = 'Clooney';