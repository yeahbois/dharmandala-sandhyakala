-- 1. Clear existing vip_seats
DELETE FROM vip_seats;

-- 2. Populate with new 108 seats (A01-A12 to I01-I12)
INSERT INTO vip_seats (seat_number, status) VALUES
('A01', 'available'), ('A02', 'available'), ('A03', 'available'), ('A04', 'available'), ('A05', 'available'), ('A06', 'available'), ('A07', 'available'), ('A08', 'available'), ('A09', 'available'), ('A10', 'available'), ('A11', 'available'), ('A12', 'available'),
('B01', 'available'), ('B02', 'available'), ('B03', 'available'), ('B04', 'available'), ('B05', 'available'), ('B06', 'available'), ('B07', 'available'), ('B08', 'available'), ('B09', 'available'), ('B10', 'available'), ('B11', 'available'), ('B12', 'available'),
('C01', 'available'), ('C02', 'available'), ('C03', 'available'), ('C04', 'available'), ('C05', 'available'), ('C06', 'available'), ('C07', 'available'), ('C08', 'available'), ('C09', 'available'), ('C10', 'available'), ('C11', 'available'), ('C12', 'available'),
('D01', 'available'), ('D02', 'available'), ('D03', 'available'), ('D04', 'available'), ('D05', 'available'), ('D06', 'available'), ('D07', 'available'), ('D08', 'available'), ('D09', 'available'), ('D10', 'available'), ('D11', 'available'), ('D12', 'available'),
('E01', 'available'), ('E02', 'available'), ('E03', 'available'), ('E04', 'available'), ('E05', 'available'), ('E06', 'available'), ('E07', 'available'), ('E08', 'available'), ('E09', 'available'), ('E10', 'available'), ('E11', 'available'), ('E12', 'available'),
('F01', 'available'), ('F02', 'available'), ('F03', 'available'), ('F04', 'available'), ('F05', 'available'), ('F06', 'available'), ('F07', 'available'), ('F08', 'available'), ('F09', 'available'), ('F10', 'available'), ('F11', 'available'), ('F12', 'available'),
('G01', 'available'), ('G02', 'available'), ('G03', 'available'), ('G04', 'available'), ('G05', 'available'), ('G06', 'available'), ('G07', 'available'), ('G08', 'available'), ('G09', 'available'), ('G10', 'available'), ('G11', 'available'), ('G12', 'available'),
('H01', 'available'), ('H02', 'available'), ('H03', 'available'), ('H04', 'available'), ('H05', 'available'), ('H06', 'available'), ('H07', 'available'), ('H08', 'available'), ('H09', 'available'), ('H10', 'available'), ('H11', 'available'), ('H12', 'available'),
('I01', 'available'), ('I02', 'available'), ('I03', 'available'), ('I04', 'available'), ('I05', 'available'), ('I06', 'available'), ('I07', 'available'), ('I08', 'available'), ('I09', 'available'), ('I10', 'available'), ('I11', 'available'), ('I12', 'available');
