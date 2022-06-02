<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Allmychollos') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link
            rel="stylesheet"
            href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
        />
        <!-- Unicons -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body {{-- style="font-family: Montserrat, sans-serif" --}} class="antialiased">
            <nav id="top-menu" class="h-auto flex-col items-center justify-center pt-6 pb-6 md:h-full md:flex md:justify-between md:items-center bg-main-gray md:flex-row lg:max-w-full ">
                <div class="flex items-center justify-center mb-4 lg:ml-8 md:mb-0 md:ml-4">
                    <a href="/">
                        <img src="/images/logo-medium.png" alt="Allmychollos Logo" width="125" height="30">
                    </a>
                </div>
                <div>
                    <ul class="hidden flex uppercase text-white md:inline-flex md:text-sm lg:text-lg ">
                        <li class="mx-6 md:mx-2 lg:mx-4">
                            <a href="/">Home</a>
                        </li>
                        <li class="mx-8 md:mx-2 lg:mx-4">
                            <a href="/discounts">Descuentos</a>
                        </li>
                        <li class="mx-8 md:mx-2 lg:mx-4">
                            <a href="/faq">FAQ</a>
                        </li>
                        <li class="mx-8 md:mx-2 lg:mx-4">
                            <a href="/contact">Contacto</a>
                        </li>
                    </ul>
                </div>
                <!-- Search -->
                <div class="flex items-center justify-center">
                    <div class="w-4/12 min-w-fit flex lg:inline-flex items-center bg-light-gray rounded-xl  lg:w-[200px] px-3 p-0 lg:mx-4 xl:w-[28rem]">
                        <form method="GET" action="/" class="w-full">
                            <div class="flex items-center">
                                <input type="text"
                                       name="search"
                                       placeholder="Buscar..."
                                       class="bg-transparent w-full border-none placeholder-black font-semibold text-sm"
                                       value="{{ request('search') }}">
                                <button class="flex items-center justify-center w-10 bg-gradient-to-b from-button-light-red to-button-dark-red  rounded-r-xl relative -right-4 h-10">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect x="0.323608" y="0.818176" width="22.9348" height="23.4848" fill="url(#pattern0)"/>
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_12_71" transform="translate(-0.0119912) scale(0.00199997)"/>
                                            </pattern>
                                            <image id="image0_12_71" width="512" height="512" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAYAAAD0eNT6AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyVpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDcuMS1jMDAwIDc5LmIwZjhiZTkwLCAyMDIxLzEyLzE1LTIxOjI1OjE1ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjMuMiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RjE0MTNFODNEMTQzMTFFQzlFRDNGRUZGM0FCNDYyOUQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RjE0MTNFODREMTQzMTFFQzlFRDNGRUZGM0FCNDYyOUQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGMTQxM0U4MUQxNDMxMUVDOUVEM0ZFRkYzQUI0NjI5RCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGMTQxM0U4MkQxNDMxMUVDOUVEM0ZFRkYzQUI0NjI5RCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PuDIJKEAAC0xSURBVHja7N0HuC9VeS/ghXQEQbooekAEkSKiiIJKlWCU2LAQG4omGmvK1cQYFWMSvZEbrLFrbCii0aCCCNgAQUWR3osgRamC0uF+n2sMRzzAKXvvWTPzvs/zPQcB2es/a/bM779mzVpL3X777QUAmJZ7OQQAIAAAAAIAACAAAAACAAAgAAAAAgAAIAAAAAIAACAAAAACAAAgAAAAAgAAIAAAAAIAACAAAAACAAAgAACAAAAACAAAgAAAAAgAAIAAAAAIAACAAAAACAAAgAAAAAgAAIAAAAAIAACAAAAACAAAgAAAAAgAAIAAAAACAAAgAAAAAgAAIAAAAAIAACAAAAACAAAgAAAAAgAAIAAAAAIAACAAAAAzYRmHABbZClHrRq0VtWbUGguo/Gerdv/+vaOW6/76vt2fy3V/P/0m6qbur6/q/ryp+/vpmqhfRV0xX10+31/nP7s06gZdAyyspW6//XZHAf7QslHrR60Xdb+oDe9U80qbo2cZHs69U10SdXHUaVG/1bWAAABV3uQfFrVZ1CO72iRq6RF+1gwDx3d1StSpXTC4zWkAAgCM1b26G/12UY+I2qKr+0z8uOTjhZOjToz6adQPumAgFIAAAIO0UtTW3Tf67aN2LvXZPPfs2qjjoo7uRgu+1wUFQACA5uSEup2idpnvW/6yDsuMuDnqJ1HHRB0R9e1iPgEIANCjnJC3a9Qe3Z8rOCRz4pZuhODgqMO7UQJAAIBZ/Zaf3/CfFLV7qbPx6d95UYdGHRJ1ZLnj9UVAAIDFlt/qnxj1rKinR63skDTthm5U4ItRX466ziEBAQAW1vJRu3U3/adFreKQDNL1pc4ZyDBwUDFvAAQAWIB87/5Pop4b9dTi9byxybcIvhp1QNRhxWuGIAAwebkQzwuiXl4805+KXJnw01EfjDrf4QABgGl9289X9v6i1Of69qSYphwFyEmDH476SqmvGwICACO0QdRLo15c6hr7MP+owCeiPmpUAAQAxiNX43tt1F6+7bMQowLfiPq3UhceAgQABibX3n9y1GtKXaQHFlUuMPSeqM9G3epwgABA2/IVvudE/X3Upg4HM+CcqPdGfaR4lRAEAJqTr+29tvvGv6bDwSz4VdS7u1GBax0OEADoVy7PmxP7/iFqHYeDOXBF1Pui9hMEQABg7i0XtXfUW4sZ/fQ3IrBfNyJwvcMBAgCzK7fYzdf43hx1f4eDBlwU9a5SFxa60eEAAYAZPldKXaY3X896kMNBg3JXwpx8mnsPuLCBAMAM2Dpq/6jHOxQMwA9LnZB6rEMBd+1eDgF3I5/tf6i7oLr5MxSPLnURoU9FretwgBEAFl5O8HtF1NuKXfkYtt+UOj/gHVE3OBwgAHDX9ih1uH9Dh4IRObvUNSoOcSig8giA31u71CHT/3HzZ4Q2KnWPgQOj1nI4QACgelbUKVEvcCiYwLl+RqlbUS/lcDBlHgFMW27Pm+9O7+ZQMEGHljrX5XyHAiMATKnf8xvQiW7+TNjupY58vSFqaYcDIwCMXT7f/0zUYx0K+F9Hl/oI7DyHAiMAjFE+/zzezR/+yPZRJ5Q6MgZGABiN+5b6rP/ZDsWMyvfKz4+6sNSNaa6Yry7v6qqo66JuLnV52qu7/+9Npb6jnnJHxeXm66uUey6sHLV6qdsrr3Gnypns60fNi1pBV8yoA0qdG3CNQ4EAwJDtWOrrfes7FIslbwI5V+L07mafdV735yWNtDFXbNygCwPzur9+aNQWUavqwsVyQamPBL7vUCAAMDT5DTJX8nt98ahnYdwadWbUSVE/6/48sbsRDNm8LghkPbz7c+Ni0tvCnhO5guC+pY7ggABA89aLOqh41n93cvg9n/keVeoEsKwrJ/LZ89HCVqU+935cV6s5Je5Snhv5+OxihwIBgJY9odTVztZxKP5APoc/IurI7oKe3/JvcVh+Z5n5AsHOUbuUOi+BO+Tjnmd15w4IADQnZzC/r9Thf0o5N+rwqK9FHRZ1o0Oy0IHgMVFPidq11O2grZpXA+Obot7pUCAA0Ir8tvaRqL1coH/3Lf/Lpa7y9nOnxox4UKmL5jyjGyFYZuLHI9fR+Muo3zo1EADo00bdDW+LiX7+26J+EPXFqM9HXeaUmFWrdyMDz+pCwVTDQD5CembUOU4JBAD6kM9qc7LfFCdwHdXd8A9y0+/NulF7Rj231PkDU3NVFwK+7VRAAGAu7R31oXLHAjJTkIvo5ATHnOdwklOgKflq4Uu6mtJ2u7mg08tKXWsDBABmt8+i3hL15jKdiVm5fPGHoz4ddb1ToGkZSJ9a6oTUXSZyjuZFNNfc2Lf7axAAmJWL68einj+Bz3pt1EejPhB1tq4fpJyf8sqofaJWmcDn/a8u+Nyk6xEAmEm5RnxO9ttx5J/z0lIfbbynTGdhnrHLm38+GvjbMv4lqXOdiZwXcLVuRwBgJuTa7t8odX33scpZ1fuVOrHPsqvjlCNYz+2CwJYj/pynRv1pGf4y0ggA9Cxv+rmYzf1H+vl+WOp8hm/q6ulcd0p9hTCfmW8z0s+YO0TmIkpn6m4EABbHZlHfKnW3t7E5udSJU/kan5NwuvImmSvrbT3Cz5avp/5JqaNbIACw0B7ZfSteY2Sf67RSd1jL1dRu0810IwK5uNA/l7pj4ZjkWgH5OOBY3YwAwMLIDX1y/foxzZzOIdE3Rn3OjZ+7kFsUPy/qX8u4Hnn9ugs439fFCADcnZ2i/qfULVvHINdLf2/U20vdkQ/uyUpRry51450x/R48vdRNqUAA4I/sUeqa9suP4LPkiZUz+t/QffuHRZWbEOX8gGeXcSwolLtR5h4KB+taBADmt1v3zX8MN/8fR7026hjdygx4fNT+ZRwTBW/sgv63dCt9u5dD0ITtSl3kZ+g3/xzm/PtS95J382em5LPzfF0wt+Ad+mOk/B3/StQOuhUjADy61Pf8hz7h79ColxeLnzC75kV9sNTX64YsJwbmK5A/0qUYAZimLaIOGfjN/6rum9mT3PyZA+eXuohQzgv41YA/x31KnRD4CF2KEYDpyRX+vhu19oA/Q07ye83AL8QMV/7uvLcLA0OVe1/k4wArBiIATESu7Z/PNYf6rvM1pe7y9lldSQNe2AWB+wy0/fmWTE50NIKGADByq0YdFbX5QNufK5rldsTn6Eoakq8Mfrq7kQ5RrpC5famP1GBOmAMwt5aN+tJAb/63lLp5y+Pc/GlQfnvORbTyLZQh7ia5adR/l3G8BowRAO58rKM+1X17HprzovaKOk43MgCPjTqgGxUYmk9GvaTYIAsjAKOy70Bv/vl636Pc/BmQH5Q7NtMamr2j/kkXIgCMR357ftPA2pzfQHIZ1tzE5EpdyMBcUeqrqflIYGibT7211ImNMKs8Aph9O3TfRIb0bO/a7pvIl3UfI5AhNicIrjagNt/cBZgjdB8CwDBtVOpKX0O68JwS9YzivWTGZZMu0D5sQG3Okbd8/Hae7mM2eAQwe1aMOnBgN//coGR7N39G6IyobaO+MaA2r17qvgEr6T4EgGHJ9cqHtMznx6OeXOoiPzBGuZHQU7vfzaHYMurDug4BYDj+ugxnEk8+A8o3FPYpw3x/GhZFrmfxiqjXleFMDnxeqStvwowyB2Dm5da+345abgBtzb3J853jz+k2JmjPUtfmWHEAbc1wvkupS4iDANCgXNv/+Kh1BtDWq6P2KHVZYpiqJ0T9T6lLdLfu4lLXN7hUtzETPAKYObnM7xcHcvO/vPs24ebP1H2v+124YgBtXS/qC1HL6DYEgLa8rdQlSFt3WdTOUT/RZfA7OWqXmwj9YgBtzRELKwUyIzwCmBl58cjn/ks33s6fR+0adZYugz+S23QfHrVh4+28rQvx39VlCAD9yvf8TyjtbzxyXnfzP1eXwV16YBcCHtJ4Oy+MenixfTBLwCOAJfehAdz8zy51G183f7h7OUq2Y/c707L1o96ruxAA+rN31LMbb+NFUU8sdQYxcM/ydyWH2M9vvJ3P6woWi0cAiy+fF+bQ/30abuMvS92M6HTdBYss9/LItwTu13Abc+XOrQYQVjACMBo52e+zjd/8L+++xbj5w+LJxwC7lbZfEcz1Cz7jWo4AMHdeW9p+5S+/FeRWoqfoKlgiJ5c6ebblyXa5gderdBWLyiOARZdD/ydF3bvR9t1Q6jN/i/zAzMlHad+MWr7R9uVGR5tHXaCrMAIwez7Y8M0/09zL3PxhxuU79y/qfsdatHIZ1i6HCACDs3epzwRb9cZSnwcCMy+X4X1zw+3bvXgrgEXgEcDCWzPq1Ki1Gm3fx6Jeqptg1v1n1MsbbVtOWHxYqW8AgRGAGfK+hm/+uQzxX+kimBOviTqs0batEbWfLsIIwMx5StTBjbYtZ/pvF/Vr3QRzJl+/O6b7tt2ifAvoUN2EALBklutushs12LZro7aNOk03wZzbOOqHXRhozTlRm0XdqJu4Kx4B3LO/bfTmn8ltbzd/6M2ZUS8sbb4Z8OCoV+sijAAsvnW6X/IWV/z759L2jGSYin+N+ocG25UjhDlKcakuwgjAontnozf/3K50X90DTXhTafN5+ypRb9M9GAFYdI+KOq7BkHRe17YrdRE0I2ffH1/a2xr81qhton6qizACsJDBKOr/NXh8bil1oQ83f2hLvn//rKibG2tXblz23u6aBgLAQtgr6vENtiuH836ge6BJPyp1PkBrcrOgPXUPf/RN1yOAP5Kv/eXEv9aG8o4udUOSW3URNGuZqO+V9nYLPTfqoaW9EQqMADTlZQ3e/HN73+e7+UPzfv+YrrWFuTaMerHuwQjAXVsh6qyoBzTWrrz5f1b3wGDkzoGfbKxNF0Y9pFgcCCMAC/TyBm/+n3fzh8H5r6gDG2vT+qWOcIIRgDu5d6nLZ67TUJvs7AXD1eIOopeUurLpb3UPRgDu8OrGbv7pdW7+MFiXR/2fxtp0v6hX6BqMANxh5VJnybaU1HNlsSfpGhi8b0bt1lgwyUmB1+oaIwCU8teN3fyvk9JhNHJu0W8aak8+mniVbkEAKGWlqNc01qZcW/x8XQOjkMt3v6WxNuXjxRV1jQAwdS/qEnErfhz1Pt0Co7J/1E8aas/aUS/QLdM29TkAGYBOL/Xd2BZkZ+Rqf993asLobBd1VGlnXf5c8XTTqNt0jRGAKXpaQzf/dICbP4zWMVFfbKg9G0c9RbcYAZiqo7tU3oLruzR+gdMSRisX48lRx5UaaU/uW7CDbjECMDXbNHTzT+9084fRy+V492uoPU+IeoxuMQIwNQdFPbORtlxU6k5dv3FKwuit2I0CPLCR9uRjiWfrFiMAU7FBqc//W/FGN3+YjHzc9+aG2vOMqHm6RQCYitwQY+lG2pJrhdvsB6blM1GnNdKWvBbuo0sEgClYptR3/1uRC4R4DQem5daofRtqzz7dtREBYNT2iFqvkbacFPVlpyFMUm4X/LNG2pKbBNl7RAAYvZb2w/5H3/5hsm5vbBTgZbpkWqb2FsADSl1jv4Xn/7nk76O7iwAwXcd114K+5WOJnCB9oS4xAjBGLy3tTP77Jzd/ILytkXbktXFv3WEEYKxhJ3flauHd2xOjthIAgM4JUQ9voB0/j9qwGw3ACMBo/ElpZ+GNd7n5A/PZv5F25DVyZ90hAIzNnzfSjl9EfcGpB8wn1wK5qJG27KU7BIAxWaHU1/9a8O6om5x6wHxujnp/I215etTyukQAGIt8v3XVBtpxbdRHnHbAAnwg6tcNtGO1qCfqDgFgLFrZ6CJv/lc77YAFyJv/x10zmStTeAsg992+LGrlntuRB3qTqLOcdsBdyBn4Z+e1ued25GjlOqVuXIQRgMF6cgM3/3Skmz9wD86N+k4D7Vil1DenEAAG7TmNtMOzf2BI14rn6IpxG/sjgHtH/bLUxwB9urzUZYhvdMoB9yBn4Ofrwmv03I7rotYuHgMYARioXRq4+af/cvMHFlJeKz7dQDvy0emOukMAGKpWtrf8uFMNWAQfKm2sFmqLYAFgsHZvoA1HRZ3qVAMWwelRxwoACACLZ9OoeQ204wCnGbAYPt9AGzbqCgFgUFpIrrmj1pecZsBiOLC0sSufUQABYHBaGP7/TqmLEAEsqktLfYToWooAsAjy9b/HN9AOu/4BQ7+G7BS1oq4QAIYiT9gVem7DLVFfcYoBS+Cg7lrSp7z5P0FXCABDsXMDbcilf3/lFAOWQF5DvttAO3bRFQLAUGzfQBtM/gPGci15nG4YnzEuBZwr/+WWu8v23I55URc4xYAltEGpmwT16aao+0b9VncYAWjZtg3c/E9x8wdmyHlRZ/TchuWiHqkrBIDWtTD8f4hTCxjZNWV73SAACAACACAAMHBjmwOQgSa33r1vj234TanbeNr9D5gpy3fXtpV7bMNVUWtG3aY7jAC0aLOeb/7pcDd/YIblNaXv1wHz2vpQXSEAtOqxDbThSKcVMAuOaKAN2+kGAaBVj2igDUc5rYCRXlu20g0CQKu27PnnXxd1otMKmAU/7a4xfdpCNwgALVoqavOe23Bs6X/dbmCc8try4wa+ZC2lKwSA1uRqWffpuQ1HO6WAWdT3Y4DVotbXDQJAa7ZsoA0CADD2a4zHAAKAAHAnt0b90CkFzKJjumvN1L9sIQA0lUpzre5rnFLALPp11NlGABAA2kqlZv8DU7jWGAEQAJqSO1U9uOc2nOR0AiZwrdk4ahndIAC04oFRSxsBAIwAzLrcbv3+ukEAaMU8v5SAEYA5s4FuEABa0ffJeHXUhU4nYA6cV+pkwKl/6UIAaOJkzG//tzudgDmQ15qTjQAgALQRAM5wKgFz6HQBAAGgjZPxfKcSMKFrzjxdIAAYAajOcyoBEwoARgAEgCasELWuEQBgQvr+0rFe1PK6QQAoDZyIS038lxEQAOb63rGubhAA+rZGzz//+qjLnErAHLo46oaJX3sRAMqaPf/8C4pXAIG5ldecvtceWVM3CAB9W73nn28BIKAPPzcCwNQDwFo9//xfOY2AHlxuBICpB4A1Jv5LCAgARgAQAHpwhdMIEAAQAObemhP/JQSmqe8vHx4BCAC963sS4JVOI2CCAcAIgADQu1V6/vkmAQJ96Hv0cWVdIAD0bbmef/5VTiOgB32PPloKWADoXd8n4fVOI2CC1x4BQACY/AjAjU4joAc3TfzaiwDQewq9yWkETPDLhxEAAWDyIwACACAAIABM8CT0CACY4pcPjwAEACMATiPACAACgAAAIAAgAAAAAsAYv4F7DgZM8Ru40U8BQABwGgECAALA3PMcDJgi858wAmAEADACIABgBEAAAAQAAQAjAKP/JQSmySMAjAD0/PNXdBoBE7z23KwLBICpjwCs7jQCerBGzz//Wl0gAJSJn4RrOo2ACQaAq3WBANC3KwQAYILW6vnnX6kLBIC+XT7xFA4YAejDVbpAAJj6CIAAAEzx2mMEQACYfADwCACY4rXHCIAA0LvLJ/5LCBgB6INJgALA5EcA1ncaARO89hgBEAAmPwIwL2oppxIwx9fuB/Xchot1gwAw9RGAFaLWdSoBc2i90v8y5L/QDQJA3y6Jur2BUQCAqVxzcgXWS3WDANC3Gxo4ETdwKgETuubkt//bdIMA0ILzjAAAAsCcuVAXCAACgBEAYHpfOi7SBQJAK87v+ec/1KkEzKFNjQAgALQRALYoXgUE5kZeazYTABAA2ggAq5b+38kFpmHDqFV6bsOZukEAaMV5DbRhS6cTMJFrzem6QQBoxc+jbu25DVs4nYA5sHnPP/+6YhKgANCQm6POEgCACXh4zz//jNL/4msIAH/gxJ5/vkcAwBS+bJymCwSA1pzU88/fpNTJgACzZbWojRoYAUAAMAJwp2P5GKcUMIu2a+C6bQKgACAALMD2TilglgNA307RDQJAay6IuloAAEbscT3//HwDwCMAAaA5OSv15J7bsG3UMk4rYBYsG7VNz204vtgFUABoVN+PAe4dtZXTCpgFj4xaqec2/Eg3CACt+lkDbfAYAJgNLTz/P143CACtOqaBNuzstAJmwS4NtMEIwIgsdfvto1rQKXfJujxq9R7b8JuoNaJudHoBM2SFqCtKv48AruqubVYBNALQpDwxj+25DTkP4PFOLWAG7VD6f/5/vJu/ANC6oxtow+5OLWAGPcm1FQFgGCfpk5xawMiuKd/RDeMytjkAacVSFwRarud2zCt1cSKAJbFB1Lk9tyHnNN036nrdYQSgZXmCniCxAyPxpw204Vg3fwFgKFp4DPAMpxcwkmvJd3SDADAURzTQhlwPYG2nGLAE1i31DQABAAFgIR1Z+h+uWtooALCE9uyuJX3K5//H6QoBYCjy5v/9BtrxbKcYsASe1UAbji6e/wsAA3NoA23Iobv1nGbAYrhf6X/73/Q1XSEADM0hjRxfjwGAxfGcRq7RAoAAMDinR53XQDue6zQDFjMA9O3MqLN0hQAwRC08BsjtgR/mVAMWwaZRj2mgHQfrCgFgqA5ppB37ONWARfDyRtph+H/ExrgU8PxyZ75flv530cotih9QbBEM3LPc+vcXpd9tzVMuqZ5rmdysS4wADNFvor7eQDvWjHq60w1YCM9o4OafDnXzFwCG7guNtONlTjdgQNeKA3XFuI39EUDK4bTLou7TczvyQG9SzKgF7tqDu2vEUj2349elLkNsASAjAIN2Q2ljIkv+Qv+VUw64G69p4Oaf/tvNXwAYi5YeA6zhtAMW4L5RL2mkLZ/XHQLAWHwz6poG2pFvJbzUaQcswCuiVm6gHfnW0hG6QwAYi3z97quNtCWH+JZz6gHzWT7qVY205aBi9r8AMDIHNNKO3BxoL6ceMJ8/L3XznxZ8QXdMwxTeApg/7Jwb9aAG2nJy1JalvhkATPw6HHVS1GYNtCX3T9ko6jbdYgRgTPKE/kQjbdk86klOPyA8pZGbf/qom78RgLHK5XjPj1q6gbYcH7WNUQCY/Lf/47prQd9uKXWE9GLdYgRgjC4qbewQmB4Z9WdOQZi0ZzRy808Hu/kLAGP3kYba8vaJ9gFQf/ff7NqIADB3vt5Qys25AHs6DWGSnlPqZOAWXBh1mC4RAMYun3N9oqH2vLW0MScBmDv5O/+WhtrzsahbdYsAMAUfbehk3zTq+U5FmJQXlro5WAtyobQP6xIBYCrOj/pyQ+35l1KXCQbGL5f7fXtD7flc1CW6RQCYkn9vqC33j3qD0xEm4Y2lrgjainfrkmma2joAd/a9qMc30pbctjgfB5zvtITR2iDq1KgVGmnPt6J20y1GAKZov4bakheEdzolYdTe1dDNP/2HLjECMNnPH3VK9827FTuUOjIBjMuOUd9uqD1nRD2sWPrXCMBEZfp5T2NtykTutUAYl2Wi9m+sTfu5+QsAU/fJqMsaas/WUa/VLTAqfxP18Ibakwv/fEq3CABTl5Pv3ttYm95W6mQhYPgeXNpa9Ce9o9T3/5mwqc8B+L18L/ecqLUbatORUbsWuwXCoK+xUd+MemJj3/4fIgBgBKC6rrT1RkDaOeoFugYG7cWN3fx9+8cIwAKsGHV2aWuBjitLnaV7me6BwVkz6rTuz1bkin/5SOJ63YMRgDvkL0Rr7+GvXtp7SwFYOP/Z2M0//YubP0YAFiwX6Dgr6gGNtetFxYxdGJK9S1u7jqZ89r9xqROfwQjAndzQJeTWvL/USTtA+zYsba6v/yY3f4wA3L3lok4v7b2G94OoJ0TdoougWbngz1FR2zbWrhOiHlks/IMRgLt1U9TfN9iux3YJHmjXWxq8+afXu/ljBGDhfbf7xt2S/AXeuWsb0Jbtu9/N1pby/kbUk3UPAsDCyyV5f1TaGyW5IOpRUZfrImjGWlHHR63fWLtujdoq6mRdxJ15BHDXflLam8WbHhT1+WLDIGhF/i5+psGbf/q4mz9GABbPOlFnRt2nwbblal7/oIugd7l+yOsbbNfVpW51fqkuwgjAossV+N7eaNveELWnLoJePS3q/zTatje5+WMEYMnka4EnlbqARmtyD4OccXyqboI5t0nUD0ubI4THd9eGW3UTRgAWX74W+LpG25a7GB4Utapugjm1WtRXGr3559tCr3DzRwCYGYdEfa7Rtm3aXYiW000wJ5aNOjDqoY2270OlvsEEd8sjgIWXm3qcErV2o+3L2b776CaY3Wtm97u2d6Pt+2UXTK7SVRgBmDn53v3fNty+l0T9o26CWfVPDd/8S3eNcvPHCMAsOTjqKY22LTszdw78tG6CGffcUh8FLtVo+74WtYduQgCYPfNKfStg5Ubbd2PUblHf01UwY3aKOrS0O9fmyqjNoy7RVSwsjwAW3fmlDgO2avlSRym20VUwI3Ip3S+XtifavsbNHyMAcyOX/sxNP7ZvuI1XRO1YLAMKS2LLqG9Hrd5wG79a6oJEIADMkQ1K3WP7Pg23MWcE7xB1uu6CRbZRqY/S7td40M+hfyv+scg8Alh850W9svE25iuLh5W6gRCw8OZFHdn4zT+92s0fAaAfuQPYAY23MXcoOyJqPd0FCyV/Vw4vbe7uN79PDeD6Q8M8AlhyuQzvCd03hpadH7Vr1Dm6DO7Sg7qb/0aNt/PsqK2jrtVlGAHozzVRLyjtr7udASUnM22sy2CBcnOf7w/g5p+v+j7HzR8BoA1HRb1jAO3MIc2c1LSlLoM/8LBSn/mvP4C25lbgP9FlLCmPAGbOst0F5HEDaGvOHN496se6DX63ZkYu8rP6ANqaa3w8tdRVP0EAaEjOGD6+tD9zOF3TXUi+q9uYsFzhr9Vtfe/soqhHlLovCSwxjwBmVq7E9cyomwbQ1py8mK8IPl+3MVHPjvrGQG7+N3bXFjd/BICG/SDq7wbS1lzaNF8leqtuY2JeG/X5qBUG0t5XRf1QtzGTPAKYPZ8obW8bemefjPqLqJt1HSO2TNT7u3N9KP4z6q90HQLAcOQ3i6NLfVd3KHLBoBxmvEb3MUKrRB1Y6gTYocgRxR3LMB4rIgAwnw1LnWl/3wG1+bSop0edofsYkU1L3dHvoQNq88VRjyp2+WOWmAMwu84tw5kUOP+F8oddCIAx2DPquIHd/NOb3fwRAIYtV997URnWe7s5K/pLUe8u9ZkpDFFu250LdOWw/yoDbP+7Sl2jAGaFRwBz561Rbxlgu78T9dyoy3QhA7Jm1Oeinjjwz3F11G5RP9KlCAADPtalvhnwogG2/YKoP486RjcyAI+P+mwZxrK+C+OqUjfysvwvM8ojgLmTSetlpe40NjS5Q1ruIZDDqcvqShqVj6veWupjt/VH9LlyEnG+oeNxAEYABi6fr+fmQVsMtP05QfB5pW5HCq2YF/WZqO1H/Bk9DsAIwMD9OmqPqAsH2v5Hl7rfwQt1JY3YO+rEkd/802pR3yzDWlsEIwAswMalDquvM+DP8MVSlyj9pe6kB/m7k6v6PXNin9ucAIwADNyZpc5QvmLAn+FZpS4YlMuqLqVLmeNz7+QJ3vyTOQEYARiJraKOLMNaLXBBvtsFgTN1KbMoV9f8YBn+630zwZwAjAAM3AlRT466buCfY4fus7yh1AVYYCblDP/cwe9nbv7/K+cEHGYkACMAw5cXtYOjlh/BZ/lp1OtKneMAS2rHqP2jHu5QLJA5ARgBGLhvlfpc88YRfJZHlPpI4AulriEAi2ODqINKfa/fzf+u5ePDXF/E2wEYARjBt50cCVh5JJ8nN0LKZ7ZvirpW97IQVop6famPk1ZwOBaaOQEIACOQS5l+rdRFg8biF1H/WOpiLbfqYhYgn/O/IOrtUes5HIvF4wAEgBHI4bxc9GPNkX2u06P+rdS12gUBUj6KzNf5/jlqE4fDSAACAKVsWuqzvTF+Gzq11HXb8xmvk3Ci15+op0S9rdTXYRECEACYz8ZdCFh/pJ8vlxXObZK/IQhM7sa/b6kTRpkdHgcgAIxAzqT/etRmI/6MuarbfqXu4X6TLh+lfMU1N5L6m5Gfy0IAAgAzapVSX6t70sg/52WlvjXwnqgrdfso5GTWF0f9XdQDHI4553EAAsAILBf1oVJ3Pxu7XBnxY6Vu9nKWrh+kfHz1yqiXlPG81jpUGaafaCQAAWD4cknU/yjT2YAn5wl8uNRXCH+r+5uWw/x/Vuq+ELsUm0QZCUAAYMblqoGfKtNaKOWaUh+DfKDUNeFpx0NLHZnap4zv1VUhAAGA5uwY9aWo1Sf42Y+NOqDU1wgvdir04v5Re0btFbXtBD9/nnf5Bsv/LcPazdPjAASAkVi/CwFT3RHstqgfRH2xGx241Ckxq9YodffKHIHavdTV+6bomC78XFLqGgaHd8fGSAACAHNqxVJnzr9w4schVxb8TheIDo06z6kxI3JTnnz7JFfry22fp77dc/6u5Tyc+V9X3boLAUYCEADoRU68em+pbwtQyrndRTn3VcjdFm9wSBZKzit5XKnvj2c90iH5ndyp81VRH72Lf24kAAGAXm1X6nC4zVT+UL49cGTUEaUO3/406maH5XeW7b7B5rmTM/d3KnVHPu5wUalD/sfdw79nJAABgF6tVeoEuV0cirsNBBkC8hXDo7pwcMVEPnsuKrVt9y0/v93n7pOrOiXu0mGlPl67bCH/fSMBCAD0KidnvTnqjcUz24WRkwlzwaETuzqpq5xHMNRfknwHP5/fbxm1Rfdn1kal7sDH3csh/zeUuirlop4DRgIQAOjd9qUuoDPPoVgs15a6T8FpUed3geD3f17cQDjIm/x63Y1+g66f8898L3/z7ts+i+7MUl9vXJKboRCAAEDvcng3l9R9nkMx498QLyj1+fAvS32EcHn35/x1fVfpmm60IecfXNf9vVwmd9nuW/nvh+LzGXxOxlujqzXn++ustUtdVz83ilpeV8yoXGDrlfP1z5IQAhAAaMLzuiDgeS/8sQxrry51/sxMEgIQAGjCvFIfCWzvUMD/+mrUy8vsLSQlBNAcE4Gm5/xSZ33/ZanPt2HKru5+F55WZncVybyJ7lyG9aZJLjGer81u4zQxAsD45OSx93cXP5iaQ6JeFvWLOfyZXhHECABNyFnsT496ftSvHA4mIidsviDqT+f45p9O6G6mVw3oeK1W6tLaWzt1BADG57NRm0R92KFgxHK489NRm5U6D6YvHgfQBI8AuLPc4S0XPnmIQ8GI5IqPryhtDWObGIgRAJpyaPcN6XWlvrMOQ3ZNdy5vW9p7hm0kACMANCsXm3l71D7CIgOTW0N/IuqfyuzO7jcSgADAqOXM5f1L3QseWpc307+L+tnAfse8HcCc8q2OhZEzl3eMenbUuQ4HDZ+nT+zqZwNsu7cDEABo1hdL3WQmF0650OGgEXku7l3q1saHD/hz5HD6rgMLATkn4FtCwDB5BMDiWq676L6l1AWFYK5dFvUfpb61cv2IPpfHAQgADCoI7Bu1rsOBG78Q4BQVAJiW3NI2d1LLV67WdjiYBTnU/46oj5W6FfPYeTsAAYBByT3sXxj1N6WuLghL6rTuG/+nJnLjFwIQABj2uRW1S9Rro57icLAYjo56Z9TXSl3Gd6o8DkAAYLAeEfXXUXtFLeNwcDduivpq1L+7eQgBCACMx7yol0a9uHhzgD/086iPR32otL9yX188DkAAYPBy/YlcA/0vSt2O2KjANOVyvd8udRfK/466xSExEoAAwHTcr9RJgxkGNnQ4JuGiUreg/kD3zR8hAAGAiY8K5KTBnCfwtDKsYU7uWe54d1DU56O+F3WbQ7JEPA5AAGCUlo7aqRsZ+LOoVR2SQfpt1NejPh31zVIn+GEkwEiAAAALJdcV2D3qOVF7RN3bIWn+Ap83+wOjvhF1g0NiJMBIgAAAS2rFbmTgSV0o2MghacKZpb6rn/X9YjKfECAECAAwyzbqwkDWjl1AYPblt/pjSh3ePzjqLIdECBACBADoc3Rgh1InEm4X9ahSNypiZm74x0V9p6tji6F9IUAIEACgUTl3YJuo7bvKULC6w7JQ8jn+j0tditcNXwgQAgQAGPa5HrVpFwRy9vQWUVtGrTbx43Jdd+H9cVc5O/ucMu2194UAIUAAgAl4YBcGsh7e/blx1LIjvNGf0dWp3Z+ndH96J18IEAIEAKDUpYnvH7VBqfsXbDBf5f/OfQzu1Vibb476Ramr7F3Q/XWusndmd5O34p4QIAQgAMASWj5qnag1o9YqdSGWO1f+s9Xn+/dX6v561S485AjDyt3fu77c8Yz9N+WOBXOu7f7ZVfPVlXf637lxzoXdn77JIwQgAADwO1YMZIHu5RAAjNoJUbuWuh/DUOTk3MNKfZMHAQAAIQABAAAhAAEAACEAAQAAIQABAAAhAAEAACFAAABACBACBAAAhAAhQAAAQAgQAgQAAIQAIUAAAEAIEAIEAACEACFAAABACBACBAAAhAAhQAAAQAgQAgQAAIQAIUAAAEAIEAIEAACEACFAAABACBACBAAAhAAhQAAAQAgQAgQAAIQAIUAAAEAIEAIEAACEAAEAAIQAAQAAhAABAACEAAEAAIQAAQAAhAABAAAhQAgQAAAQAoQAAQAAIUAIEAAAEAKEAAEAACFACBAAABAChAABAAAhQAgQAAAQAoQAAQAAIUAIEAAAEAKEAAEAACFACBAAABACphkCBAAAhIAJhgABAAAhYIIhQAAAQAiYYAgQAAAQAiYYAgQAAISACYYAAQAAIWCCIUAAAEAImGAIEAAAEAImGAIEAACEgAmGAAEAgCGFgN2irhpYCDg06hGtNWyp22+/3SkFwJBsHXV41H0H1ObLoraPOkcAAIDFt1UXAtYYUJtPjnp01PUtNMYjAACGaIiPAzaP2tcIAAAsuaE9DrgparOos40AAMDi+0nUzmU4bwcsF/V6IwAAMDOGNCfgt1HrRF1nBAAAlsyQ5gSsFPXkvhshAAAwFvk4YNeBhICdBAAAmNkQMIQ5AQ8TAABgZg1h2eB1BQAAmF4IuJ8AAADTCwG9v4InAAAgBMy9SwQAAJheCLhUAACAuQkBLa0TcJoAAABzo6V1Ao7suwGWAgZgavpeNthSwADQg77nBHym75u/EQAApqyPrYRzO+BcBfCcvj+8EQAApqqPOQH7t3DzNwIAAHM3J+CkqG2jrm/hQxsBAGDq5uIVwcuintbKzV8AAIAqHwfs0t2oZ+Pmv3vUuS19YAEAAKqfRm0fdeIM/jfzv7VdqaMMTREAAOAOOUHvMVH/HnXzEvx3bur+G9u29s3/90wCBIAFe0jU66OeF7XiQv5/8hn/Z6PeGXV2yx9OAACAu7dK1JOjdir1Hf51o9br/tnFpW7sc2qpy/t+vTSwyI8AAAAskDkAACAAAAACAAAgAAAAAgAAIAAAAAIAACAAAAACAAAgAAAAAgAAIAAAAAIAACAAAAACAAAgAAAAAgAAIAAAgAAAAAgAAIAAAAAIAACAAAAACAAAgAAAAAgAAIAAAAAIAACAAAAACAAAgAAAACyG/y/AAGV31jzFH1k/AAAAAElFTkSuQmCC"/>
                                        </defs>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="w-16 flex items-center justify-center ml-12 lg:mr-8 lg:hidden">
                        @auth
                            <a href="/users/{{ auth()->user()->username }}" class="mr-6">
                                <svg id="user-logo" data-name="user-logo" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 459 459"><defs><style>.cls-1{fill:#f3eff5;}</style></defs><path class="cls-1" d="M229.5,0C102.53,0,0,102.85,0,229.5,0,356.3,102.72,459,229.5,459,356.85,459,459,355.82,459,229.5,459,102.55,356.08,0,229.5,0ZM347.6,364.67a179.48,179.48,0,0,1-236.18,0,16.37,16.37,0,0,1-5.25-15.6c11.3-55.2,46.46-98.73,91.21-113C174,222.22,158,193.82,158,161c0-46.39,32-84,71.5-84S301,114.61,301,161c0,32.81-16,61.21-39.37,75,44.75,14.31,79.91,57.84,91.21,113A16.38,16.38,0,0,1,347.6,364.67Z"/></svg>
                            </a>
                                <form id="logout-form" action="/logout" method="POST" class="">
                                    @csrf
                                    <button><i class="uil uil-signout logout__icon"></i></button>
                                </form>
                        @else
                            <a href="/login">
                                <svg id="user-logo" data-name="user-logo" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 459 459"><defs><style>.cls-1{fill:#f3eff5;}</style></defs><path class="cls-1" d="M229.5,0C102.53,0,0,102.85,0,229.5,0,356.3,102.72,459,229.5,459,356.85,459,459,355.82,459,229.5,459,102.55,356.08,0,229.5,0ZM347.6,364.67a179.48,179.48,0,0,1-236.18,0,16.37,16.37,0,0,1-5.25-15.6c11.3-55.2,46.46-98.73,91.21-113C174,222.22,158,193.82,158,161c0-46.39,32-84,71.5-84S301,114.61,301,161c0,32.81-16,61.21-39.37,75,44.75,14.31,79.91,57.84,91.21,113A16.38,16.38,0,0,1,347.6,364.67Z"/></svg>
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="hidden mt-8 md:mt-0 flex items-center lg:inline-flex">
                    @auth
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="text-sm font-bold uppercase text-white">Bienvenido, <span class="text-sm font-bold uppercase text-button-light-orange mr-8 ml-1">{{ auth()->user()->username }}<i class="uil uil-angle-down ml-2"></i></span></button>
                            </x-slot>
                            @if(auth()->user()->role_id == 1)
                                <x-dropdown-item href="/admin/discounts" :active="request()->is('admin/discounts')">Admin Dashboard</x-dropdown-item>
                            @endif
                            <x-dropdown-item href="/users/{{ auth()->user()->username }}" :active="request()->is('discounts/create')">Mi Perfil</x-dropdown-item>
                            <x-dropdown-item href="/user/discounts" :active="request()->is('discounts/create')">Mis Descuentos</x-dropdown-item>
                            <x-dropdown-item href="/user/discounts/create" :active="request()->is('discounts/create')">Crear Descuento</x-dropdown-item>
                            <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                            <form id="logout-form" action="/logout" method="POST" class="hidden">
                                @csrf
                            </form>
                        </x-dropdown>
                    @else
                        <a href="/login" class="px-4 py-2 text-lg font-bold uppercase text-white">
                            <button class="font-bold px-4 py-2 rounded-xl bg-gradient-to-b from-button-light-red to-button-dark-red drop-shadow-xl transition-transform hover:-translate-y-0.5">
                                Login
                            </button>
                        </a>
                        <a href="/register" class="px-4 py-2 mr-6 text-lg text-white font-bold uppercase">
                            <button class="font-bold px-4 py-2 rounded-xl bg-gradient-to-b from-button-light-red to-button-dark-red drop-shadow-xl transition-transform hover:-translate-y-0.5">
                                Registro
                            </button>
                        </a>
                    @endauth
                </div>
            </nav>

            <nav class="nav__menu_bottom z-50 md:hidden">
                <ul class="nav__list">
                    <li class="nav__item transition-transform hover:-translate-y-0.5">
                        <a href="/" class="nav__link active-link"><i class="uil uil-estate nav__icon"></i>Home</a>
                    </li>

                        @auth
                        <li class="nav__item transition-transform hover:-translate-y-0.5">
                            <a href="/users/{{ auth()->user()->username }}" class="nav__link active-link"><i class="uil uil-user-circle nav__icon"></i>Perfil</a>
                        </li>
                        @else
                        <li class="nav__item transition-transform hover:-translate-y-0.5">
                            <a href="/login" class="nav__link active-link"><i class="uil uil-user-circle nav__icon"></i>Login</a>
                        </li>
                        @endauth

                    <li class="nav__item transition-transform hover:-translate-y-0.5">
                        <a href="/discounts" class="nav__link active-link"><i class="uil uil-pricetag-alt nav__icon"></i>Discounts</a>
                    </li>
                    {{--   Menu will be added on the future if it has more pages to add     --}}
{{--                    <li class="nav__item transition-transform hover:-translate-y-0.5">--}}
{{--                        <a href="/" class="nav__link active-link"><i class="uil uil-bars nav__icon"></i>Menu</a>--}}
{{--                    </li>--}}
                </ul>
            </nav>

            <!-- Page Content -->

                {{ $slot }}
            <footer class="bg-main-gray text-center py-16 px-10 w-full flex-col items-center justify-center">
                <div class="flex items-center justify-center my-4">
                    <img src="/images/logo-medium.png" alt="Allmychollos Logo" width="145" height="50">
                </div>
                <div class="block">
                    <h1 class="text-white font-bold text-lg mt-8 mb-4">Suscribete a nuestro newsltter</h1>
                    <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                        <form method="POST" action="/newsletter" class="lg:flex text-sm">
                            @csrf
                            <div class="lg:py-3 lg:px-5 flex items-center">
                                <label for="email" class="hidden lg:inline-block"></label>
                                <div>
                                    <input id="email"
                                           type="text"
                                           placeholder="Introduce tu email"
                                           name="email"
                                           class="lg:bg-transparent w-full py-2 lg:py-0 pl-4 border-none rounded-xl focus-within:outline-none">


                                </div>

                            </div>

                            <button type="submit"
                                    class="transition-colors duration-300 bg-button-light-orange hover:bg-button-dark-orange mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                            >
                                Suscribete
                            </button>
                        </form>
                    </div>
                    @error('email')
                    <p class="text-xs text-red-500 mt-4"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="flex items-center justify-between mt-8 lg:justify-around">
                    <div class="mx-2">
                        <h2 class="font-bold text-white mb-4">Menu</h2>
                        <ul class=" ">
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Home</a>
                            </li>
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Descuentos</a>
                            </li>
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">FAQ</a>
                            </li>
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Contacto</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mx-2">
                        <h2 class="font-bold text-white mb-4">Ayuda</h2>
                        <ul class=" ">
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Facturación</a>
                            </li>
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Sobre Nosotros</a>
                            </li>
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Terminos de uso</a>
                            </li>
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Privacidad</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mx-2">
                        <h2 class="font-bold text-white mb-4">Visítanos</h2>
                        <ul class=" ">
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Instagram</a>
                            </li>
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Twitter</a>
                            </li>
                            <li class="text-gray-400 hover:text-gray-200">
                                <a href="/">Facebook</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full border-t border-gray-400 mt-6">
                    <p class="text-light-gray mt-6">Copyright © 2022 AllMyChollos. Todos los derechos reservados </p>
                </div>
            </footer>


            <!-- SwiperJS -->
            <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    </body>
<x-flash />
</html>
