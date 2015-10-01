# phpfiltergenerator
This repo is code generator for php filter proceed 


This is a startup project. But then not makes comments

-- Bu dökümantasyon şimdilik yalnızca türkçe için mevcuttur.

Filter nesnesi


Filter nesnesi bir yapıcı metod içermediğinden örneği yaratılır iken bir işlem gerçekleşmez.
Şöyle ki;

$filtre=new Filter(); Şeklinde yaratılabilir.

Bazı metod ve fonksiyonları vardır. Bunları sırasıyla başlıklar altında inceleyecek olur isek;

addFilteredColumn($ColumnKey,$ColumnValue="");
-- Burada fonksiyona verdiğimiz değer bir filtrelenecek kolonun adını yada imzasını içerir.
-- ilk parametreye field'ın benzersiz adını yazınız, ki size karıştırmayacağınız bir bilgi gelsin.
-- Dilerseniz buna bir görüntüleme adı tanılayabilirsiniz. Buda GKA(Grafiksel Kullanıcı Arayüzü) katmanlarında değer görüntülemenizi sağlayacaktır.

getFilteredColumnList();
-- bu method, sınıf örneğinin içerisinde istiflenmiş filtreli sütunların listesi ekrana dökecektir.


addColumnAndValueViaMySQLResult($mysqlResult);
-- bu fonksiyon, verdiğiniz mysql sorgusunun dönen cevap nesnesini değerlendirir ve size filter nesnesini hazırlar.
-- desteklediği nesne yapıları : şimdilik yok.

addValueToFilteredColumn($FilteredColumnName,$Value)
-- Bu fonksiyon, daha önce oluşturduğunu filtrelenebilir sütuna karşılaştırma değeri vermek için kullanılır. 
-- Tek değer verilebildiği gibi çift değerde verilebilir.
Örneğin:
 addValueToFilteredColumn("sehir","Izmir");
 addValueToFilteredColumn("ilce","Bornova");
 addValueToFilteredColumn("ilce","Bayraklı");

Gibi bir kullanımda şunu diyebiliriz; daha önce eklediğimiz filterColumn objesi olan sehir, bize bir sorgulama bağı oluşturmuştur.
Biz bu bağa verdiğimiz değer olan Izmir ile belli değerleri getirebiliriz.
Bu, aynı şekilde ilce bağındada geçerlidir. Bu bağlar birbirlerini etkilememekle beraber, gelen cevap elbetteki sehir ve ilce bilgilerinin eş tutarlılığını arayacaktır.
ilce bağında verdiğimiz değer olan Bornova ve Bayraklı, görüldüğü üzere 1'den fazla adet bilgisine sahip olduğundan Bornova veya Bayraklı olanları getirecektir.

Sonuç olarak Kod;
Izmir şehrine Bornova veya Bayraklı ilçelerine bağlı kayıtları getirecektir.










