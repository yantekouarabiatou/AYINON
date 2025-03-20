<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, .15); font-size: 16px; line-height: 24px; color: #555; }
        .invoice-box table { width: 100%; line-height: inherit; text-align: left; }
        .invoice-box table td { padding: 5px; vertical-align: top; }
        .invoice-box table tr td:nth-child(2) { text-align: right; }
        .invoice-box table tr.top table td { padding-bottom: 20px; }
        .invoice-box table tr.top table td.title { font-size: 45px; line-height: 45px; color: #333; }
        .invoice-box table tr.information table td { padding-bottom: 40px; }
        .invoice-box table tr.heading td { background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; }
        .invoice-box table tr.details td { padding-bottom: 20px; }
        .invoice-box table tr.item td { border-bottom: 1px solid #eee; }
        .invoice-box table tr.item.last td { border-bottom: none; }
        .invoice-box table tr.total td { border-top: 2px solid #eee; font-weight: bold; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset($entreprise['logo']) }}" style="width:100%; max-width:300px;">
                            </td>
                            <td>
                                Facture #{{ $vente->id }}<br>
                                Date: {{ $vente->created_at->format('d F Y') }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                {{ $entreprise['nom'] }}<br>
                                {{ $entreprise['adresse'] }}
                            </td>
                            <td>
                                {{ $client['nom'] }}<br>
                                {{ $client['adresse'] }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Produit</td>
                <td>Prix</td>
            </tr>
            @foreach($venteDetails as $detail)
                <tr class="item">
                    <td>{{ $detail->produit->name }} (x{{ $detail->quantite }})</td>
                    <td>{{ number_format($detail->montant_total, 2) }} FCFA</td>
                </tr>
            @endforeach
            <tr class="total">
                <td></td>
                <td>Total: {{ number_format($vente->montant_total, 2) }} FCFA</td>
            </tr>
        </table>
    </div>
</body>
</html>
