<?php 

	require_once "../../classes/conexao.php";
	require_once "../../classes/vendas.php";
	$c= new conectar();
	$conexao=$c->conexao();

	$obj= new vendas();

	$sql="SELECT pro.quantidade,
					cat.nome_categoria,
					img.url,
					cat.nome_categoria,
					pro.id_produto
		  from produtos as pro 
		  inner join imagens as img
		  on pro.id_imagem=img.id_imagem
		  inner join categorias as cat
		  on pro.id_categoria=cat.id_categoria";
	$result=mysqli_query($conexao,$sql); 
	?>


<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<caption><label><h3>Estoque</h3></label></caption>
				<tr>
					<td>Lista Estoque</td>
					<td>Unidades</td>
					<td>Marca</td>
				</tr>

				<?php while($mostrar=mysqli_fetch_row($result)): ?>
				<tr>
					<td>Garrafão 20 Litros</td>
					<td><?php echo $mostrar[0]; ?></td>
					<td>
						<?php 
						$imgVer=explode("/", $mostrar[2]) ; 
						$imgurl=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
						?>
							<img width="80" height="80" src="<?php echo $imgurl ?>">
					</td>
				</tr>
<?php endwhile; ?>
		
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>


