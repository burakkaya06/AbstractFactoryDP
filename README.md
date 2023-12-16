# Absract Factory Design Pattern

Bu projeyi basit seviyede Abstract Factory Design patterni göstermek ve uygulamak amacıyla yazdım.
Abstact Factory runtime da client (istemci) ile sunucuya soyutlamak amacıyla kullanılır. Bu ne demek ? Şöyle diyelim ben bu örnekte bir eticaret entegrasyonu yapan müşteri olarak düşündüm.
Müşteri Mng Kargoyu kullanmak istiyor. Cliente istek atarken Mng olarak gönderiyor.

Runtime'da MNG Factory'si oluşturulup barkod süreci ve kargo fiyatı hesaplama işlemleri gerçekleşiyor Burada clienti Nasıl barkod oluşturulacağı nasıl hesaplama yapılacağı ilgilendirmiyor bu bağlamda sadece Mng Kargo bilgisini verdiğinizde tüm bu işlemleri soyutladığımız sınıflar yapıyor ve burada görüldüğü üzere loose coupling (gevşek bağlılık) oluşuyor. Zaten solid prensibleride loose coupling'i destekler

Peki neden Factory değilde Abstract Factory ;
Yukarıdaki yazıda şundan bahsettim 1. Kargo Fiyat Hesaplaması , 2 Barkod basma süreçleri bu ikisini birer nesne olarak düşünelim. Eğer elinizde birbirinden farklı 2 amacı olup bir hizmete yöneliyorsa burada abstract factory'i kullanmamız gerekir. Yarın bir gün Rota Planlama gibi bir hizmet daha gelebilir. Bu hizmeti eklemek soyutlandığından dolayı kolay olacaktır. Kodun sürdürülebilirliğini arttıracaktır.
Şunuda diyebiliriz neden bunları farklı nesneler olarak düşünüyoruz, tek bir interface'in altına bu methodları toplar kullanılacak factoryleri buradan soyutlarız. Bu kodun Solid prensiplerine aykırı bir durumdur. SOLID'den I (interface segregation) derki farklı amaçları olan methodları kodun sürdürülebilitesi için farklı interfacelerde oluştur. Bu yüzdendir ki abstract factory patterni kullandık. Aşağıda daha iyi anlayacaksınız



# Files
1) Nesneler nedir ?

- Barkod Süreçleri (IBarcode)
- Kargo fiyatlandırma (ICalculate)

Nesneleri belirledikten sonra bunları soyutlamamız lazım;
bu IBarcode ve ICalculate interfaceleri gelecek olan kargoda birer somut classları gerçekleyecektir.

2) Factory Nedir ?
   Factory fabrika demektir. Yani istekte buluncağız içerde bu factory bağımız olmadan işlemlerine başlayacaktır. Bu da soyut olacaktır ki gelecek olan kargoyu gerçekleyebilsin
   bunada ICargoFactory adını verip bir interface oluşturuyoruz.
   Bu interface daha önce oluşturduğumuz IBarcode ve ICalculate tipinde 2 method içerecek burada yeni bir hizmet geldiğinde buraya eklenebilir.

3) Somut (concrete) classlar
   Artık Kargo Factorylerimizi sisteme dahil edeceğiz.
   Diyelim ki Kargomuz PTT;
   Hizmet sayımız 2 olduğundan IBarcode ve ICalculate interfacelerimi gerçekleyen 2 somut class üretiyoruz :
   class PTTBarcode implements IBarcode
   class PTTShipment implements ICalculate

Burada IBarcode bir methodu bulunmakta createBarcode
ICalculate ise calculateShipPrice olarak
Gelelim bu kargo şirketinin factorysini üretmeye bir üste interfaceni üretmiştik şimdi ise Somut classını üretmeye bu ürettiğimiz class sayesinde fabrika oluşmuş olacak.

class PTTFactory implements ICargoFactory
burada yukarıda oluşturduğumuz interaface'nin methodları aslında hizmetleri return etmek için

4) Clientdan İstek

İstek atabilmemiz için constructur da ICargoFactory tipinde nesne alan bir somut class yaratmalıyız.
İsmi CargoOperation olsun , burada clientdan göndereceğin ICargoFactory tipindeki nesne sayesinde içerideki bağımsız methodlar çalışacaktır.

$ptt = new PTTFactory();    
$cargo = new CargoOperation($ptt);  
$cargo->calculateOperations();  
$cargo->createBarcodeOperations();

Burada ptt değişkeni bir ICargoFactory tipinde nesnedir.
CargoOperation constructor'unda ICargoFactory tipindeki nesneyi bekler calculateOperations, createBarcodeOperations CargoOperation sınıfında tanımlanan custom methodlar